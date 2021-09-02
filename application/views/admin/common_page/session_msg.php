<?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success" role="alert">
    <strong>Success! </strong><?php echo $this->session->flashdata('success'); ?>
    </div>
<?php } else if($this->session->flashdata('error')){ ?>
    <div class="alert alert-danger" role="alert">
    <strong>Error! </strong><?php echo $this->session->flashdata('error'); ?>
    </div>
<?php } else if($this->session->flashdata('warning')){ ?>
    <div class="alert alert-warning" role="alert">
    <strong>Warning! </strong><?php echo $this->session->flashdata('warning'); ?>
    </div>
<?php } else if($this->session->flashdata('info')){ ?>
    <div class="alert alert-info">
    <strong>Info! </strong><?=$this->session->flashdata('info'); ?>
    </div>
<?php } ?>