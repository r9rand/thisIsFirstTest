<footer class="fixed-bottom bg-light py-4 container">
  <div class="row">
    <div class="col-3 col-lg-12 footer-box ">
      <div class="timeline-btn">
        /index
      </div>
      <i class="fas fa-home"></i>
    </div>
    <div class="col-3 col-lg-12 footer-box ">
      <div class="search-btn">
        /search
      </div>
    </div>
    <div class="col-3 col-lg-12 footer-box ">
      <div class="alerts-btn">
        <?php $cell = $this->cell('Notify', [$user_id]); ?>
        <?= $cell->render() ?>
        /alerts
      </div>
    </div>
    <div class="col-3 col-lg-12 footer-box ">
      <div class="user-btn">
        /user
      </div>
    </div>
  </div>
</footer>
