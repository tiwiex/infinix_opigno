<?php

namespace Drupal\infinix_conf\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class InfinixConfigForm extends ConfigFormBase {
	/**
	 *      * {@inheritdoc}
	 *           */
	protected function getEditableConfigNames() {
		return ['infinix_conf.settings'];
	}

	/**
	 *      * {@inheritdoc}
	 *           */
	public function getFormId() {
		return 'infinix_conf_form';
	}

	/**
	 *      * {@inheritdoc}
	 *           */
	public function buildForm(array $form, FormStateInterface $form_state) {
		$config = $this->config('infinix_conf.settings');
		$form['signin_message'] = [
			'#type' => 'textfield',
			'#title' => $this->t('Sign-in Message'),
			'#default_value' => $config->get('signin_message'),
		];
		return parent::buildForm($form, $form_state);
	}

	/**
	 *      * {@inheritdoc}
	 *           */
	public function submitForm(array &$form, FormStateInterface $form_state) {
		$this->config('infinix_conf.settings')
       ->set('signin_message', $form_state->getValue('signin_message'))
       ->save();
		parent::submitForm($form, $form_state);
	}
}

