<!-- Tambah data bimbingan online -->
<div class="modal fade modal-primary-custom" id="viewDetailTa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Tugas Akhir Mahasiswa</h4>
      </div>
      <div class="modal-body">
      <strong>Nama</strong>
      <p class="text-muted nama">
      
      </p>
      <hr>

      <strong>NPM</strong>
      <p class="text-muted npm">
    
      </p>
      <hr>

      <strong>Judul Tugas Akhir</strong>
      <p class="text-muted judul">
      <em>""</em>
      </p>
      <hr>

      <strong>Tanggal Acc Proposal</strong>
      <p class="text-muted acc">
      
      </p>

      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger btn-xs" data-dismiss="modal"><i class="fa fa-remove"></i> close</button>
        </form>
      </div>
      
    </div>
  </div>
</div>

<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script>
$(document).on('click', '.btn-detail-ta', function(e){
    var nama = $(this).data('nama');
    var npm = $(this).data('npm');
    var judul = $(this).data('judul');
    var acc = $(this).data('acc');

    $('.nama').html(nama);
    $('.npm').html(npm);
    $('.judul').html(judul);
    $('.acc').html(acc);
    
})

</script>