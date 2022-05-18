<template>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Catat Keuangan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/home" method="POST" >
            
                    <div class="mb-3">
                      <label for="judul" class="col-form-label">Judul:</label>
                      <input type="text" name="title" class="form-control" id="judul">
                    </div>
                    <div class="mb-3">
                      <label for="jumlah" class="col-form-label">Jumlah:</label>
                      <input type="text" name="amount" class="form-control" id="jumlah">
                    </div>
                   

                    <div class="mb-3">
                    <label for="tipe" class="col-form-label">Tipe:</label>
                    <select class="form-select " name="type" aria-label="Default select example">
                      <option selected>-- Pilih Tipe --</option>
                      <option value="pemasukan">Pemasukan</option>
                      <option value="pengeluaran">Pengeluaran</option>
                      
                    </select>
                  </div>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="submit" class="btn btn-primary">Catat</button>
                  </form>
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>

</template>