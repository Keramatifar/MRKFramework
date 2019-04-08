<?php
// Plug-in functions inside plug-in files must be named: smarty_type_name
function smarty_function_get_header($params, $smarty)
{

/*  $smarty->assign('title', $params['title']);
  $smarty->assign('subtitle', $params['subtitle']);*/
  return <<<_END
    <div class="inner-top-header">
    <div class="container">
        <div class="row">

            <!--page title-->
            <div class="page-title">
                <div class="eight columns">
                    <h1>$params[title]</h1>
                    <h5>$params[subtitle]</h5>
                </div>
            </div>
            <div class="page-search">
                <div class="four columns">


                    <form action="http://google.com/search" method="get">
                        <input type="submit" value="" />
                        <input type="hidden" name="sitesearch" value="http://barnamenevis.pro" />
                        <input type="text"  placeholder="جستجو در سایت" name="q" />
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
_END;
}
?>
