$(function() {
    $chgLangBtn = $('.chg-lang-btn');
    $tutorialCode = $('.tutorial-code');
    $( $chgLangBtn ).click( function() {
        $chgLangBtn.css('border-bottom', '5px solid rgb(209, 209, 209)');
        $(this).css('border-bottom', '5px solid OrangeRed');
        $tutorialCode.hide();
        $('#highlight-' + $(this).data('lang')).fadeIn();
    });
});

hljs.initHighlightingOnLoad();