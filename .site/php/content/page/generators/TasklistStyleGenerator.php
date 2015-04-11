<?php 
namespace content\page\generators;
require_once $_SERVER['DOCUMENT_ROOT'] . '/.site/php/utils/Autoload.php';


class TasklistStyleGenerator {
	
	/**
	 * Multi-tag mode. Each tag has its own tasklist and timescopes. All tags are displayed within
	 * the viewstyle container.
	 */
	public static function multiTagMode() {
		
echo <<<multitag
	<!-- Multi-tag View -->
	<div class="tasklist-viewstyle-container">
	
		<div class="tasklist-tag-container">
			<!-- Controls the entire tag group -->
			<input class="tasklist-tag-container-controller" type="checkbox" id="tc-hash1" />
			
			<label class="tasklist-tag-container-toggle" for="tc-hash1">
				<span class="tasklist-tag">
					<span class="tag" style="background-color:#99F"></span>
					<span class="visibility-toggle"></span>
					<span class="title">School tag that's very long and stuff but doesn't quite make it</span>
				</span>
			</label>
			
			<div class="tasklist-timescope-group">
			
				<div class="tasklist-timescope-container">
					<!-- Controls this timescope for the tag -->
					<input type="checkbox" class="tasklist-timescope-container-controller" id="tsc-hash1" />
					
					<label class="tasklist-timescope-container-toggle" for="tsc-hash1">
						<span class="tasklist-timescope">
							<span class="count">1</span>
							<span class="visibility-toggle"></span>
							<span class="name">Overdue</span>
						</span>
					</label>
					
					<div class="tasklist-task">
						<div class="tag" style="border-color: #99F"></div>
						<div class="tasklist-quickedit">
							<a href="#"><i class="complete"></i></a>
							<a href="#"><i class="edit"></i></a>
							<a href="#"><i class="delete"></i></a>
						</div>
						<label class="tasklist-task-toggle">
							<span class="middler"></span>
							<span class="middle">
								<span class="title">Some Title that's quite long and annoyiong to deal with even with the special html</span>
								<span class="hierarchy">An<i></i>Example</span>
							</span>
						</label>
					</div><!-- .tasklist-task -->

				</div> <!-- .tasklist-timescope-container -->
				
				<div class="tasklist-timescope-container">
					<!-- Controls this timescope for the tag -->
					<input type="checkbox" class="tasklist-timescope-container-controller" id="tsc-hash2" />
					
					<label class="tasklist-timescope-container-toggle" for="tsc-hash2">
						<span class="tasklist-timescope">
							<span class="count">2</span>
							<span class="visibility-toggle"></span>
							<span class="name">Today</span>
						</span>
					</label>
					
					<div class="tasklist-task complete">
						<div class="tag" style="border-color: #99F"></div>
						<div class="tasklist-quickedit">
							<a href="#"><i class="uncomplete"></i></a>
							<a href="#"><i class="edit"></i></a>
							<a href="#"><i class="delete"></i></a>
						</div>
						<label class="tasklist-task-toggle">
							<span class="middler"></span>
							<span class="middle">
								<span class="title">Giant Music Project</span>
								<span class="hierarchy hidden"></span>
							</span>
						</label>
					</div><!-- .tasklist-task -->
					<div class="tasklist-task">
						<div class="tag" style="border-color: #99F"></div>
						<div class="tasklist-quickedit">
							<a href="#"><i class="complete"></i></a>
							<a href="#"><i class="edit"></i></a>
							<a href="#"><i class="delete"></i></a>
						</div>
						<label class="tasklist-task-toggle">
							<span class="middler"></span>
							<span class="middle">
								<span class="title">Physics Webassign 24 - 40</span>
								<span class="hierarchy">Physics<i></i>Homework<i></i>Webassign</span>
							</span>
						</label>
					</div><!-- .tasklist-task -->
					
				</div> <!-- .tasklist-timescope-container -->
				
				
				
			</div> <!-- .tasklist-timescope-group -->

		</div> <!-- .tasklist-tag-container -->
		
	</div> <!-- .tasklist-viewstyle-container -->
multitag;

	}
	
	public static function singleListMode() {

echo <<<singlelist
	<!-- Single list mode -->
	<div class="tasklist-viewstyle-container">
		<div class="tasklist-timescope-group">
			<div class="tasklist-timescope-container">
				<!-- Controls this timescope for the tag -->
				<input type="checkbox" class="tasklist-timescope-container-controller" id="tsc-hash1" />
				
				<label class="tasklist-timescope-container-toggle" for="tsc-hash1">
					<span class="tasklist-timescope">
						<span class="count">1</span>
						<span class="visibility-toggle"></span>
						<span class="name">Overdue</span>
					</span>
				</label>
				
				<div class="tasklist-task">
					<div class="tag" style="border-color: #99F"></div>
					<div class="tasklist-quickedit">
						<a href="#"><i class="complete"></i></a>
						<a href="#"><i class="edit"></i></a>
						<a href="#"><i class="delete"></i></a>
					</div>
					<label class="tasklist-task-toggle">
						<span class="middler"></span>
						<span class="middle">
							<span class="title">Some Title that's quite long and annoyiong to deal with even with the special html</span>
							<span class="hierarchy">An<i></i>Example</span>
						</span>
					</label>
				</div><!-- .tasklist-task -->

			</div> <!-- .tasklist-timescope-container -->
			
			<div class="tasklist-timescope-container">
				<!-- Controls this timescope for the tag -->
				<input type="checkbox" class="tasklist-timescope-container-controller" id="tsc-hash2" />
				
				<label class="tasklist-timescope-container-toggle" for="tsc-hash2">
					<span class="tasklist-timescope">
						<span class="count">2</span>
						<span class="visibility-toggle"></span>
						<span class="name">Today</span>
					</span>
				</label>
				
				<div class="tasklist-task complete">
					<div class="tag" style="border-color: #0F0"></div>
					<div class="tasklist-quickedit">
						<a href="#"><i class="uncomplete"></i></a>
						<a href="#"><i class="edit"></i></a>
						<a href="#"><i class="delete"></i></a>
					</div>
					<label class="tasklist-task-toggle">
						<span class="middler"></span>
						<span class="middle">
							<span class="title">Giant Music Project</span>
							<span class="hierarchy hidden"></span>
						</span>
					</label>
				</div><!-- .tasklist-task -->
				<div class="tasklist-task">
					<div class="tag" style="border-color: #F99"></div>
					<div class="tasklist-quickedit">
						<a href="#"><i class="complete"></i></a>
						<a href="#"><i class="edit"></i></a>
						<a href="#"><i class="delete"></i></a>
					</div>
					<label class="tasklist-task-toggle">
						<span class="middler"></span>
						<span class="middle">
							<span class="title">Physics Webassign 24 - 40</span>
							<span class="hierarchy">Physics<i></i>Homework<i></i>Webassign</span>
						</span>
					</label>
				</div><!-- .tasklist-task -->
				
			</div> <!-- .tasklist-timescope-container -->
				
		</div> <!-- Timescope group -->
	</div> <!-- tasklist viewstyle -->
singlelist;

	}
}
?>