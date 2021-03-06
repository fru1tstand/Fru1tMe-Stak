<?php
namespace stak;
require_once $_SERVER["DOCUMENT_ROOT"] . "/.site/php/stak/Autoload.php";
use stak\filters\TaskFilter;
use stak\filters\TagFilter;
use stak\foundation\Tag;
use stak\foundation\Task;
use stak\foundation\Timescope;

/**
 * Provides an interface to access user data like stored tasks, tags, settings, account info, etc.
 * @package stak
 */
interface UserData {

	// Login / User Validation methods
	/**
	 * Returns if the user is logged in or not.
	 * @return bool
	 */
	public static function isLoggedIn();

	/**
	 * Returns the current logged in user's account. Returns null if no user is logged in.
	 * @return mixed
	 */
	public static function getLoggedInUser();


	// User-auth required methods
	/**
	 * Gets all tags the current logged in user owns or an empty array on error.
	 * @param TagFilter $filter Used to filter result tag set.
	 * @return Tag[]
	 */
	public static function getTags(TagFilter $filter = null);

	/**
	 * Gets all tasks the current logged in user owns or an empty array on error.
	 * @param TaskFilter $filter Used to filter result task set.
	 * @return Task[]
	 */
	public static function getTasks(TaskFilter $filter = null);

	/**
	 * Gets the user's timescopes or an empty array on error
	 * @return Timescope[]
	 */
	public static function getTimescopes();


	// Other
	/**
	 * Gets the user's UTC timezone
	 * @return int
	 */
	public static function getTimezone();


}
