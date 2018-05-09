<?php

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Timeline
        <small>Catatan Harian</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Timeline</li>
        <li class="active">Catatan Harian</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">

<?php
        foreach ($catatan_harian as $key => $value) {
          $detail = base_url('ta/detail_catatan_harian').'/'.$this->encrypt->encode($value['id_catatan_harian']);
?>

          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                <span class='bg-green'>
                  <?=date("d M. Y", strtotime($value['waktu_kegiatan']))?>
                </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
            <i class="fa fa-pencil bg-yellow"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?=time_elapsed_string( date('Y:m:d H:i:s', strtotime($value['waktu_kegiatan'])) )?></span>

                <h3 class="timeline-header"><a href="<?=$detail?>"><?=$value['nama_kegiatan']?></a></h3>

                <div class="timeline-body">
                <?=$value['uraian_kegiatan']?>
                </div>
                <div class="timeline-footer">
                  <a class='btn btn-primary btn-xs' href="<?=$detail?>">Read more</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
<?php } ?>
            


            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    <?=date("d M. Y", strtotime($ta['tgl_acc']))?>
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-heart bg-aqua"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?=time_elapsed_string( date('Y:m:d H:i:s', strtotime($ta['tgl_acc'])) )?></span>

                <h3 class="timeline-header no-border">Proposal Disetujui</h3>

                <div class="timeline-body">
                <img src="<?=base_url()?>assets/img/rocket-launch.jpg" class="img img-responsive" width="300px"/>
                </div>
              </div>
            </li>
            <!-- END timeline item -->

            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
