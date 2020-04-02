<?php
add_action( 'rest_api_init', function () {
  register_rest_route( 'ctl/v1', '/header/', array(
    'methods' => 'GET',
    'callback' => 'ctl_get_header',
  ) );
  register_rest_route( 'ctl/v1', '/footer/', array(
    'methods' => 'GET',
    'callback' => 'ctl_get_footer',
  ) );
  register_rest_route( 'ctl/v1', '/content/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'ctl_get_content',
  ) );
} );


function ctl_get_header(WP_REST_Request $request)
{
  $output=array();
  ob_start();
  get_header('headless');
  $output['content']=ob_get_contents();
  ob_end_clean();

	return $output;
}
function ctl_get_footer(WP_REST_Request $request)
{
	$output=array();
  ob_start();
  get_footer('headless');
  $output['content']=ob_get_contents();
  ob_end_clean();

  return $output;
}
function ctl_get_content(WP_REST_Request $request)
{
	$id = $request->get_param( 'id' );
	$content = apply_filters('the_content', get_post_field('post_content', $id));
	return $content;
}
?>