<input type="hidden" class="base_url" value="<?= getenv('APP_URL') ?>">
<input type="hidden" class="rest_url" value="<?= getenv('APP_REST_URL') ?>">
<input type="hidden" class="assets_url" value="<?= getenv('APP_ASSETS') ?>">
<input type="hidden" class="id_user" value="<?= $this->session->id_admin ?>">
<input type="hidden" class="branch_id" value="<?= $this->session->branch_id_admin ?>">