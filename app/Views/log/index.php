<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Activity Logs</h1>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
    </div>
</div>
</div>
</div>

<section class="content">
    <div class="container-fluid">
        <form id="dateFilterForm" method="get" class="mb-3">
          <div class="form-group">
            <label for="filterDate"><strong>Filter by Date:</strong></label>
            <input type="date" id="filterDate" name="date" class="form-control" style="max-width: 250px;"
            value="<?= esc($selectedDate ?? date('Y-m-d')) ?>">
        </div>
    </form>
    <?php if (!empty($logs)): ?>
        <div class="timeline timeline-inverse">
            <?php foreach ($logs as $log): ?>
                <!-- timeline item -->
                <div class="time-label">
                    <span class="bg-white">
                        <?= esc($log['DATELOG']) ?>
                    </span>
                </div>
                <div>
                    <i class="fas fa-user bg-info"></i>
                    <div class="timeline-item">
                        <span class="time">
                            <i class="far fa-clock"></i>
                            <?= esc(date('h:i A', strtotime($log['TIMELOG']))) ?>
                        </span>
                        <h3 class="timeline-header">
                            <?= esc($log['USER_NAME']) ?> (ID: <?= esc($log['USERID']) ?>)
                        </h3>
                        <div class="timeline-body">
                            <strong>Action:</strong> <?= esc($log['ACTION']) ?><br>
                            <strong>IP Address:</strong> <?= esc($log['user_ip_address']) ?><br>
                            <strong>Device:</strong> <?= esc($log['device_used']) ?><br>
                            <?php if (!empty($log['identifier'])): ?>
                                <strong>Identifier:</strong> <span class="badge badge-primary"><?= esc($log['identifier']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div>
                <i class="fas fa-clock bg-gray"></i>
            </div>
        </div>
        <?php else: ?>
            <div class="alert alert-info">
                No activity logs found.
            </div>
        <?php endif; ?>
    </div>
</section>
</div>
<div class="toasts-top-right fixed" style="position: fixed; top: 1rem; right: 1rem; z-index: 9999;"></div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
  document.getElementById('filterDate').addEventListener('change', function () {
    document.getElementById('dateFilterForm').submit();
});
</script>
<?= $this->endSection() ?>