<?php 


class Controller {

	public static function CreateView($viewname) {
		require_once("./view/$viewname.php");
	}

		public static function CreateIndex($viewname) {
		require_once("$viewname.php");
	}

}
?>