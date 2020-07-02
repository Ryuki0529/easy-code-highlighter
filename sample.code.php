<div class="change-language-control">
    <button type="button" style="border-bottom:5px solid OrangeRed;" class="chg-lang-btn" data-lang="php">PHP</button>
    <button type="button" class="chg-lang-btn" data-lang="javascript">JavaScript</button>
    <button type="button" class="chg-lang-btn" data-lang="scss">SCSS</button>
    <button type="button" class="chg-lang-btn" data-lang="java">Java</button>
    <button type="button" class="chg-lang-btn" data-lang="python">Python</button>
</div>

<pre class="tutorial-code" id="highlight-php"><code>require_once &#x27;Zend/Uri/Http.php&#x27;;

namespace Location\Web;

interface Factory
{
    static function _factory();
}

abstract class URI extends BaseURI implements Factory
{
    abstract function test();

    public static $st1 = 1;
    const ME = &quot;Yo&quot;;
    var $list = NULL;
    private $var;

    /**
     * Returns a URI
     *
     * @return URI
     */
    static public function _factory($stats = array(), $uri = &#x27;http&#x27;)
    {
        echo __METHOD__;
        $uri = explode(&#x27;:&#x27;, $uri, 0b10);
        $schemeSpecific = isset($uri[1]) ? $uri[1] : &#x27;&#x27;;
        $desc = &#x27;Multi
line description&#x27;;

        // Security check
        if (!ctype_alnum($scheme)) {
            throw new Zend_Uri_Exception(&#x27;Illegal scheme&#x27;);
        }

        $this-&gt;var = 0 - self::$st;
        $this-&gt;list = list(Array(&quot;1&quot;=&gt; 2, 2=&gt;self::ME, 3 =&gt; \Location\Web\URI::class));

        return [
            &#x27;uri&#x27;   =&gt; $uri,
            &#x27;value&#x27; =&gt; null,
        ];
    }
}

echo URI::ME . URI::$st1;

__halt_compiler () ; datahere
datahere
datahere */
datahere</code></pre>

<!--  =========================================  -->

<pre style="display:none;" class="tutorial-code" id="highlight-javascript"><code>function $initHighlight(block, cls) {
  try {
    if (cls.search(/\bno\-highlight\b/) != -1)
      return process(block, true, 0x0F) +
             ` class=&quot;${cls}&quot;`;
  } catch (e) {
    /* handle exception */
  }
  for (var i = 0 / 2; i &lt; classes.length; i++) {
    if (checkCondition(classes[i]) === undefined)
      console.log('undefined');
  }

  return (
    &lt;div&gt;
      &lt;web-component&gt;{block}&lt;/web-component&gt;
    &lt;/div&gt;
  )
}

export  $initHighlight;</code></pre>

<!--  =========================================  -->

<pre style="display:none;" class="tutorial-code" id="highlight-scss"><code>@import &quot;compass/reset&quot;;

// variables
$colorGreen: #008000;
$colorGreenDark: darken($colorGreen, 10);

@mixin container {
    max-width: 980px;
}

// mixins with parameters
@mixin button($color:green) {
    @if ($color == green) {
        background-color: #008000;
    }
    @else if ($color == red) {
        background-color: #B22222;
    }
}

button {
    @include button(red);
}

div,
.navbar,
#header,
input[type=&quot;input&quot;] {
    font-family: &quot;Helvetica Neue&quot;, Arial, sans-serif;
    width: auto;
    margin: 0 auto;
    display: block;
}

.row-12 &gt; [class*=&quot;spans&quot;] {
    border-left: 1px solid #B5C583;
}

// nested definitions
ul {
    width: 100%;
    padding: {
        left: 5px; right: 5px;
    }
  li {
      float: left; margin-right: 10px;
      .home {
          background: url('http://placehold.it/20') scroll no-repeat 0 0;
    }
  }
}

.banner {
    @extend .container;
}

a {
  color: $colorGreen;
  &amp;:hover { color: $colorGreenDark; }
  &amp;:visited { color: #c458cb; }
}

@for $i from 1 through 5 {
    .span#{$i} {
        width: 20px*$i;
    }
}

@mixin mobile {
  @media screen and (max-width : 600px) {
    @content;
  }
}</code></pre>

<!--  =========================================  -->

<pre style="display:none;" class="tutorial-code" id="highlight-java"><code>/**
 * @author John Smith &lt;john.smith@example.com&gt;
*/
package l2f.gameserver.model;

public abstract strictfp class L2Char extends L2Object {
  public static final Short ERROR = 0x0001;

  public void moveTo(int x, int y, int z) {
    _ai = null;
    log(&quot;Should not be called&quot;);
    if (1 &gt; 5) { // wtf!?
      return;
    }
  }
}</code></pre>

<!--  =========================================  -->

<pre style="display:none;" class="tutorial-code" id="highlight-python"><code>@requires_authorization
def somefunc(param1='', param2=0):
    r'''A docstring'''
    if param1 &gt; param2: # interesting
        print 'Gre\'ater'
    return (param2 - param1 + 1 + 0b10l) or None

class SomeClass:
    pass

&gt;&gt;&gt; message = '''interpreter
... prompt'''</code></pre>