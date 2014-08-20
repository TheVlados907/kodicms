<?php defined('SYSPATH') or die('No direct access allowed.');/** * @package		KodiCMS/Plugins * @category	Controller * @author		ButscHSter */class Controller_Plugins extends Controller_System_Backend{	public function before()	{		parent::before();		$this->breadcrumbs			->add(__('Plugins'), Route::get('backend')->uri(array('controller' => 'plugins')));	}	public function action_index()	{		Assets::package('backbone');		$this->template->content = View::factory('plugins/index');		$this->template->title = __('Plugins');	}	public function action_repo()	{		Assets::package('backbone');				$this->set_title(__('Repository'));		$this->template->content = View::factory('plugins/repo');			}	public function action_settings()	{		$plugin_id = $this->request->param('id');		$plugin = Plugins::get_registered($plugin_id);		if ($this->request->method() == Request::POST)		{			return $this->_settings_save($plugin);		}		$this->template->content = View::factory('plugins/settings', array(			'content' => View::factory($plugin->id() . '/settings', array(				'plugin' => $plugin			))		));				$this->set_title(__('Plugin :title settings', array(			':title' => $plugin->title()		)));	}	protected function _settings_save($plugin)	{		$data = Arr::get($this->request->post(), 'setting', array());		try		{			$plugin				->set_settings($data)				->validate()				->save_settings();			Kohana::$log->add(Log::INFO, ':user change settings for plugin :name ', array(				':name' => $plugin->title()			))->write();			Messages::success(__('Plugin settings saved!'));		} catch (Validation_Exception $e)		{			Messages::errors($e->errors('validation'));			$this->go_back();		}		// save and quit or save and continue editing?		if ($this->request->post('commit') !== NULL)		{			$this->go(array(				'controller' => 'plugins'			));		}		else		{			$this->go_back();		}	}}