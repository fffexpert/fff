<?php
  /* Minifies HTML and removes comments (except IE tags and comments within script tags)
  *
  * To disable compression of code portions, use '<!--wp-html-compression no compression-->' tag
  *
  * @see http://forrst.com/posts/Wordpress_Minify_output_HTML-29q
  * @see http://www.intert3chmedia.net/2011/12/minify-html-javascript-css-without.html
  */
  class WP_HTML_Compression {
    // Settings
    protected $compress_css = true;
    protected $compress_js = false;
    protected $info_comment = true;
    protected $remove_comments = true;

    // Variables
    protected $html;

    public function __construct($html) {
      if (!empty($html)) {
        $this->parseHTML($html);
      }
    }

    public function __toString() {
      return $this->html;
    }

    protected function minifyHTML($html) {
      $pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
      preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
      $overriding = false;
      $raw_tag = false;
      // Variable reused for output
      $html = '';
      foreach ( $matches as $token ) {
        $tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
        $content = $token[0];
        if ( is_null( $tag ) ) {
          if ( !empty( $token['script'] ) ) {
            $strip = $this->compress_js;
          } else if ( !empty($token['style'] ) ) {
            $strip = $this->compress_css;
          } else if ( $content == '<!--wp-html-compression no compression-->' ) {
            $overriding = !$overriding;
            // Don't print the comment
            continue;
          } else if ( $this->remove_comments ) {
            if ( !$overriding && $raw_tag != 'textarea' ) {
              // Remove any HTML comments, except MSIE conditional comments
              $content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
            }
          }
        } else {
          if ( $tag == 'pre' || $tag == 'textarea' || $tag == 'script' ) {
            $raw_tag = $tag;
          } else if ( $tag == '/pre' || $tag == '/textarea' || $tag == '/script' ) {
            $raw_tag = false;
          } else {
            if ($raw_tag || $overriding) {
              $strip = false;
            } else {
              $strip = true;
              // Remove any empty attributes, except:
              // action, alt, content, src
              $content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
              // Remove any space before the end of self-closing XHTML tags
              // JavaScript excluded
              $content = str_replace(' />', '/>', $content);
            }
          }
        }
        if ( $strip ) {
          $content = $this->removeWhiteSpace($content);
        }
        $html .= $content;
      }
$comment = "<!-- Сделано с любовью и заботой <3 -->\n\n\n";
  return $comment . PHP_EOL . $html;
    }
    public function parseHTML($html) {
      $this->html = $this->minifyHTML($html);
    }
    protected function removeWhiteSpace($str) {
      $str = str_replace( "\t", ' ', $str );
      $str = str_replace( "\n",  '', $str );
      $str = str_replace( "\r",  '', $str );

      while ( stristr($str, '  ' ) ) {
        $str = str_replace('  ', ' ', $str);
      }
      return $str;
    }
  }
  function wp_html_compression_finish($html) {
    return new WP_HTML_Compression($html);
  }
  function wp_html_compression_start() {
    ob_start( 'wp_html_compression_finish' );
  }
  add_action( 'get_header', 'wp_html_compression_start' );
