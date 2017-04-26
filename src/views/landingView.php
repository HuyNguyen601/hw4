<?php
namespace hw4\views;

class landingView {

	public function __construct(){
		?>
		<form>
		<input id="name" type="text" placeholder="New sheet name or code">
		<input id="go" type="button" value="Go">
		</form>
		<?php
	}
}
