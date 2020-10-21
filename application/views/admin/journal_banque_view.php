<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $titre; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('administrator~gie2018');?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li><a href="<?php echo site_url('administrator~gie2018/journal');?>"><i class="fa fa-book"></i> Journal</a></li>
            <li class="active"><?= $lien; ?></li>
        </ol>
    </section>
</div>