<?php
namespace stak\base;
require_once $_SERVER["DOCUMENT_ROOT"] . "/.site/php/stak/Autoload.php";
use stak\base\userdata\TaskFilter;

/**
 * Mock implementation of UserData for testing
 * @package stak\base
 */
class MockUserData implements UserData {
	/**
	 * Gets a set of fake tasks. Currently ignores filters.
	 * @param TaskFilter $filter
	 * @return mixed
	 */
	public function getTasks(TaskFilter $filter = null) {
		// Create tags
		$schoolTag = new MockTag("School tag that's very long & will run off the page. "
				. "Consequently this tag is also the maximum length in character which is 128.",
				"99F");
		$importantTag = new MockTag("Important", "F00");
		$projectsTag = new MockTag("Projects", "9F9");
		$qaTag = new MockTag("Th!s <will> <break> !@$&^*^)*()[]\{\}<><> \"everything'!!", "000");

		// Create tasks
		$musicTask = new MockTask("Music task that is pretty much going to be an essay because 512"
								  . " characters is really long. I may consider shortening the "
								  . "maximum title length because honestly, 512 is the size of my "
								  . "IT tech paper that was due not too long ago and that was about"
								  . " the size of a single page. The rest of this will probably be "
								  . "lorem ipsum if I can't think of anything else to type. May as "
								  . "well abuse the rest of the space with some garbage text. Man "
								  . "music is really great. Well anyway, here approaches 512 "
								  . "characters, the max length.",
				"Do I really want to make a description?",
				time() - 86400,
				null,
				$schoolTag,
				array($schoolTag, $importantTag),
				Task::TYPE_NORMAL);
		$musicProjectTask = new MockTask("Music Project",
				"Giant music project overarching whatever",
				time() + 86400 * 14,
				null,
				$schoolTag,
				array($schoolTag, $importantTag, $projectsTag),
				Task::TYPE_NORMAL);
		$musicProjectReminder = new MockTask("Music Project Reminder",
				"A reminder to do the giant music project",
				time() + 86400 * 7,
				null,
				$schoolTag,
				array($schoolTag, $importantTag, $projectsTag),
				Task::TYPE_REMINDER);
		$musicProjectReminder2 = new MockTask("Music Project Reminder",
				"A reminder to do the giant music project",
				time() + 86400 * 3,
				null,
				$schoolTag,
				array($schoolTag, $importantTag, $projectsTag),
				Task::TYPE_REMINDER);
		$webassignContainer = new MockTask("Webassign",
				"",
				null,
				null,
				$schoolTag,
				array($schoolTag),
				Task::TYPE_CONTAINER);
		$webassign1 = new MockTask("Physics Webassign 4, 5, 6, 20-30",
				"",
				time(),
				time() + 300,
				$schoolTag,
				array($schoolTag),
				Task::TYPE_NORMAL);
		$webassign2 = new MockTask("Physics Webassign 2, 4, 6-30",
				"",
				time() + 86400,
				null,
				$schoolTag,
				array($schoolTag),
				Task::TYPE_NORMAL);
		$webassign3 = new MockTask("Physics Webassign 1-3, 6+",
				"",
				time() + 86400 * 2,
				null,
				$schoolTag,
				array($schoolTag),
				Task::TYPE_NORMAL);
		$shedProject = new MockTask("Build a shed",
				"I mean, you gotta build yer shed",
				time() + 86400 * 5,
				null,
				$projectsTag,
				array($projectsTag),
				Task::TYPE_NORMAL);

		// Build associations
		$musicProjectTask->addChild($musicTask);
		$musicTask->addChildren(array(&$musicProjectReminder, &$musicProjectReminder2));
		$webassignContainer->addChildren(array(&$webassign1, &$webassign2, &$webassign3));

		// Finally, return list of tasks
		return array($musicTask, $musicProjectTask, $musicProjectReminder,
				$musicProjectReminder2, $webassignContainer, $webassign1, $webassign2,
				$webassign3, $shedProject);
	}
}
