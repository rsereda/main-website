<?php namespace Kironuniversity\Git\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use GitWrapper\GitWrapper;
use Flash;
/**
 * Deploy Back-end Controller
 */
class Deploy extends Controller
{

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Kironuniversity.Git', 'git', 'deploy');
    }

    public function index(){
      $wrapper = new GitWrapper('git');
      $git =  $wrapper->workingCopy('.');
      $this->vars['changed'] = $git->hasChanges();
      $this->vars['changes'] = nl2br($git->status(['porcelain' => true,
      'u' => true])->getOutput());
    }

    public function onPush(){
      $wrapper = new GitWrapper('git');
      $git =  $wrapper->workingCopy('.');
      if($git->hasChanges){
        $git->add('.')->commit('content updates')->push();
      }
      Flash::success('Done');
    }
}
