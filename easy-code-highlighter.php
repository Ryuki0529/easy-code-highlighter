<?php
/*
    Plugin Name: Easy code highlighter
    Plugin URI:
    Description: highlighter.jsをWordPressで簡単に導入するためのプラグイン
    Version: 1.0.0
    Author: Lhaplus
    Author URI: https://twitter.com/prog_lhaplus
    License: GPLv2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class EasyCodeHighlighter {

    const VERSION           = '1.0.0';
    const PLUGIN_ID         = 'easy-code-highlighter';
    //const NONCE_ACTION      = self::PLUGIN_ID . '-nonce-action';
    //const NONCE_KEYTEXT     = self::PLUGIN_ID . '-nonce-key';
    const PLUGIN_DB_PREFIX  = self::PLUGIN_ID . '_';
    const STYLE_FILES_PATH  = __DIR__.'/highlight.js/styles';

    public static function init() {
        return new self();
    }

    function __construct() {
        if ( is_admin() && is_user_logged_in() ) {
            add_action( 'admin_menu', [$this, 'set_plugin_menu'] );
            add_action( 'admin_menu', [$this, 'save_config'] );
            add_action('admin_print_styles', function() {
                ?><link rel="stylesheet" href="<?= plugin_dir_url( __FILE__ ) ?>highlight.js/styles/<?= get_option( self::PLUGIN_DB_PREFIX.'_selectThema' ) ?>.css">
                <link rel="stylesheet" href="<?= plugin_dir_url( __FILE__ ) ?>/css/override.css">
                <link rel="stylesheet" href="<?= plugin_dir_url( __FILE__ ) ?>/css/override.admin.css"><?php
            });
            add_action('admin_print_scripts', function() {
                ?><script src="<?= plugin_dir_url( __FILE__ ) ?>js/jquery-3.4.1.min.js"></script>
                <script src="<?= plugin_dir_url( __FILE__ ) ?>highlight.js/highlight.pack.js"></script>
                <script src="<?= plugin_dir_url( __FILE__ ) ?>js/init.js"></script><?php
            });
        }
    }

    public function set_plugin_menu() {
        add_options_page(
            'コードハイライト設定', 'コードハイライト設定',
            'manage_options', self::PLUGIN_ID, [$this, 'show_about_page']
        );
    }

    public function show_about_page() {
        $themeName = get_option( self::PLUGIN_DB_PREFIX.'_selectThema' );
        //$themeName = ( $themeName === FALSE ) ? 'default' : $themeName;
        //var_dump( $themeName );
        ?>
        <div class="wrap">
            <h1>コードハイライト設定</h1>
            <p>記事で利用するhighlighter.jsの設定を行います。</p>

            <form action="" method='post' class="form-table">
            <?php //wp_nonce_field( self::NONCE_ACTION, self::NONCE_KEYTEXT ) ?>

                <div class="ech-wrap">
                    <div class="sample-code-elem">
                        <label class="full-width">プレビュー</label>
                        <?php require_once __DIR__.'/sample.code.php' ?>
                    </div>
                    <div class="setting-right-elem">
                        <label class="full-width">テーマ選択</label>
                        <div class="thema-name-list">
                            <?php foreach( glob( self::STYLE_FILES_PATH.'/{*.css}', GLOB_BRACE ) as $file ): ?>
                                <?php if ( is_file( $file ) ): ?>
                                    <?php $file = basename( $file, '.css' ); ?>
                                    <input type="radio" id="<?= $file ?>" <?= ( $themeName === $file ) ? "checked" : ""; ?> name="theme-name" value="<?= $file ?>" />
                                    <label for="<?= $file ?>"><?= $file ?></label>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <p><input type='submit' value='保存' class='button button-primary button-large'></p>
            </form>
        </div>
        <?php
    }

    public function save_config() {
        if ( isset( $_POST['theme-name'] ) && $_POST['theme-name'] !== "" ) {
            //check_admin_referer( self::NONCE_ACTION, self::NONCE_KEYTEXT );
            update_option( self::PLUGIN_DB_PREFIX.'_selectThema', $_POST['theme-name'] );
            ?>
            <div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible">
            <p><strong>設定を保存しました。</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">この通知を非表示にする。</span></button></div>
            <?php
        }
    }
}

register_activation_hook( __FILE__, function() {
    add_option( EasyCodeHighlighter::PLUGIN_DB_PREFIX.'_selectThema', 'default' );
} );

add_action( 'wp_head', function() {
?>
    <!-- highlightスクリプト読み込み -->
    <link rel="stylesheet" href="<?= plugin_dir_url( __FILE__ ) ?>highlight.js/styles/<?= get_option( EasyCodeHighlighter::PLUGIN_DB_PREFIX.'_selectThema' ) ?>.css">
    <script src="<?= plugin_dir_url( __FILE__ ) ?>highlight.js/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <link rel="stylesheet" href="<?= plugin_dir_url( __FILE__ ) ?>/css/override.css">
<?php
} );

register_deactivation_hook( __FILE__, function() {
    delete_option( EasyCodeHighlighter::PLUGIN_DB_PREFIX.'_selectThema' );
} );

add_action('init', 'EasyCodeHighlighter::init');

?>