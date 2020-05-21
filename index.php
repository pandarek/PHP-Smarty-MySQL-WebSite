<?php
require 'config.php';
require 'libs/Smarty.class.php';


$smarty = new Smarty;

$action = isset($_GET['action']) ? $_GET['action'] : "";

switch ($action) {
    case 'viewArticle':
        viewArticle($smarty);
        break;
    default:
        homepage($smarty);
        break;
}

function viewArticle($smarty)
{
    if (!isset($_GET["articleId"]) || !$_GET["articleId"]) {
        homepage($smarty);
        return;
    }
    $results = array();
    $results['article'] = Articles::getById((int)$_GET["articleId"]);
    $results['pageTitle'] = $results['article']->title . " | " . HOME_PAGE_TITLE;

    $smarty->assign('pageTitle', $results['pageTitle']);
    $smarty->assign('article', $results['article']);
    $smarty->display('viewArticle.tpl');

}

function homepage($smarty)
{
    $data = Articles::getList(HOMEPAGE_NUM_ARTICLES);

    $smarty->assign('pageTitle', HOME_PAGE_TITLE);
    $smarty->assign('articles', $data);
    $smarty->display('index.tpl');

}