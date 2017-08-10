<?php

namespace WSUWP\Content_Syndicate\WSU_Taxonomies;

add_filter( 'wsuwp_content_syndicate_json_taxonomy_filters', 'WSUWP\Content_Syndicate\WSU_Taxonomies\build_taxonomy_filters', 10 );

/**
 * Build taxonomies on the REST API request URL generated by WSUWP Content Syndicate.
 *
 * @since 0.0.1
 *
 * @param string $request_url
 * @param array  $atts
 *
 * @return string
 */
function build_taxonomy_filters( $request_url, $atts ) {
	$university_category = false;

	if ( ! empty( $atts['university_category'] ) ) {
		$university_category = sanitize_terms( $atts['university_category'] );
	} elseif ( ! empty( $atts['university_category_slug'] ) ) {
		$university_category = sanitize_terms( $atts['university_category_slug'] );
	}

	if ( ! empty( $university_category ) ) {
		$request_url = add_query_arg( array(
			'filter[wsuwp_university_category]' => $university_category,
		), $request_url );
	}

	$university_organization = false;

	if ( ! empty( $atts['university_organization'] ) ) {
		$university_organization = sanitize_terms( $atts['university_organization'] );
	} elseif ( ! empty( $atts['university_organization_slug'] ) ) {
		$university_organization = sanitize_terms( $atts['university_organization_slug'] );
	}

	if ( ! empty( $university_organization ) ) {
		$request_url = add_query_arg( array(
			'filter[wsuwp_university_org]' => $university_organization,
		), $request_url );
	}

	$university_location = false;

	if ( ! empty( $atts['university_location'] ) ) {
		$university_location = sanitize_terms( $atts['university_location'] );
	} elseif ( ! empty( $atts['university_location_slug'] ) ) {
		$university_location = sanitize_terms( $atts['university_location_slug'] );
	}

	if ( ! empty( $university_location ) ) {
		$request_url = add_query_arg( array(
			'filter[wsuwp_university_location]' => $university_location,
		), $request_url );
	}

	$category = false;

	// Support the older site_category_slug attribute as well as category.
	if ( ! empty( $atts['category'] ) ) {
		$category = sanitize_terms( $atts['category'] );
	} elseif ( ! empty( $atts['site_category_slug'] ) ) {
		$category = sanitize_terms( $atts['site_category_slug'] );
	}

	if ( ! empty( $category ) ) {
		$request_url = add_query_arg( array(
			'filter[category_name]' => $category,
		), $request_url );
	}

	if ( ! empty( $atts['tag'] ) ) {
		$tag = sanitize_terms( $atts['tag'] );
		$request_url = add_query_arg( array(
			'filter[tag]' => $tag,
		), $request_url );
	}

	return $request_url;
}

/**
 * Sanitize a list of term slugs so that they can be appended as query
 * variable data in a URL.
 *
 * @since 0.0.1
 *
 * @param string $terms
 *
 * @return string
 */
function sanitize_terms( $terms ) {
	$term_array = explode( ',', $terms );
	$sanitize_term_array = array_map( 'sanitize_key', $term_array );
	$imploded_terms = implode( ',', $sanitize_term_array );
	return $imploded_terms;
}
