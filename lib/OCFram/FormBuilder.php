<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 31/12/2017
 * Time: 15:21
 */

namespace OCFram;


	abstract class FormBuilder
	{
		protected $form;

		public function __construct(Entity $entity)
		{
			$this->setForm(new Form($entity));
		}

		abstract public function build();

		public function setForm(Form $form)
		{
			$this->form = $form;
		}

		public function form()
		{
			return $this->form;
		}
	}