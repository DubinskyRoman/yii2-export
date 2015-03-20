<?php
 use  yii\helpers\Html; 
 use  yii\helpers\Url;
 ?>
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    Save as... <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><?= Html::a('HTML', [Url::base(), 'rmdExportType' => 'html']); ?></li>
    <li><?= Html::a('PDF', [Url::base(), 'rmdExportType' => 'pdf'],['target'=>'_blank']); ?></li>
    <!--<li><?= Html::a('XLS', [Url::base(), 'rmdExportType' => 'xls']); ?></li>
    <li><?= Html::a('XLSX', [Url::base(), 'rmdExportType' => 'xlsx']); ?></li>-->	
  </ul>
</div>