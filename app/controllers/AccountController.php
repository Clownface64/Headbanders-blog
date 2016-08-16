<?php

class AccountController extends MasterController {

	public function buildHTML() {
		
		echo $this->plates->render('account');

	}

}