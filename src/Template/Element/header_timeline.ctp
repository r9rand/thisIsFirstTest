<header class="sticky-top container">
  <div class="row">
    <div class="col-8 bg-primary header-left">
      <!-- <a href="nanika">nanika</a> -->
      <nav class="navbar navbar-light bg-light">
        <form class="form-inline" action="http://localhost/r9rand6/reports/search">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">#</span>
            </div>
            <input type="text" class="form-control" placeholder="タグを検索" name="tag" aria-label="Username" aria-describedby="basic-addon1">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i>Search</button>
          </div>
        </form>
      </nav>
    </div>
    <div class="col-2 bg-light header-margin">

    </div>
    <div class="col-2 bg-info header-right">
      <!-- <a href="/upload" class="upload-btn">/upload</a> -->
      <?= $this->Html->link('UPLOAD', ['action'=>'upload']) ?>
    </div>
  </div>
</header>
