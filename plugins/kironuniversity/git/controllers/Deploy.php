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
      $wrapper->git('config --global push.default simple');
      $git =  $wrapper->workingCopy('.');
      $git->checkout('dev');
      $pushLog =  '';
      $mergeLog = '';
      if($git->hasChanges()){
        $pushLog =  nl2br($git->add('.')->commit('content updates')->push()->getOutput());
        $mergeLog = nl2br($git->checkout('master')->merge('dev')->push()->checkout('dev')->getOutput());
      }
      Flash::success('Done');
      return ['#output' => '<p>'.$pushLog.'</p><p>'.$mergeLog.'</p>'];
    }
}
