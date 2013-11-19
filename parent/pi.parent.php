<?php
class Plugin_parent extends Plugin
{

	var $meta = array(
		'name'       => 'Parent Page Helper',
		'version'    => '1.0',
		'author'     => 'Andrew Munsell',
		'author_url' => 'http://andrewmunsell.com/'
	);

	/**
	 * Retrieve the parent page
	 * @return Array Array containing the content of the parent page
	 */
	private function getParent() {
		$parent = URL::popLastSegment(URL::getCurrent(false));
		return Content::get($parent);
	}

	/**
	 * Retrieve the title of the parent page
	 * @return String Title of the parent page
	 */
	public function title()
	{
		$page = $this->getParent();

		return count($page) == 0 ? null: $page['title'];
	}

	/**
	 * Retrieve the URL of the parent page
	 * @return String URL of the parent page
	 */
	public function url()
	{
		$page = $this->getParent();

		return count($page) == 0 ? null: $page['url'];
	}
}