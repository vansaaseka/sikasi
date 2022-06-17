 {{ $tombol = '' }}
 <p>Pilih salah satu untuk memperbarui status:</p>
 @foreach ($trxstatus as $a)
     @if ($a->pengajuan_id == $datapengajuan->id)
         @for ($s = 0; $s < count($status); $s++)
             @if ($a->status_id == $status[$s]->id)
                 @if ($status[$s]->namastatus === 'Ajuan Diterima')
                     <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" id="status_id" "value="2"><label>Dokumen direview BPU</label></div>'; ?>
                 @elseif ($status[$s]->namastatus === 'Dokumen direview BPU')
                     <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" id="status_id" "value="2"><label>Dokumen direview BPU</label></div>'; ?>
                 @elseif ($status[$s]->namastatus === 'LPJ Selesai')
                     <?php $tombol = ''; ?>
                 @endif
             @endif
         @endfor
     @endif
 @endforeach
 <?= $tombol ?>
