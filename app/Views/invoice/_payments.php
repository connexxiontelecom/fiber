<div class="options mb-3">
  <?php for($i = 1; $i <= $num_payments; $i++ ):?>
    <div class="form-group row">
      <div class="col-md-10">
        <div class="form-group">
          <label class="form-label" for="descriptions-<?=$i?>">Payment Description <?=$i?> </label>
          <div class="form-control-wrap">
            <select class="form-control" id="descriptions-<?=$i?>" name="descriptions[]">
              <option value="">Default Option</option>
              <?php foreach ($descriptions['plans'] as $plan):?>
                <option value="<?= $plan['name'] ?>"><?=$plan['name']?></option>
              <?php endforeach;?>
              <?php foreach ($descriptions['services'] as $service):?>
                <option value="<?= $service['name'] ?>"><?=$service['name']?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-label" for="quantities">Quantity</label>
          <input type="number" id="quantities" name="quantities[]" class="form-control" min="0">
        </div>
      </div>
      <input type="hidden" value="<?=$num_payments?>" name="num_payments">
    </div>
  <?php endfor?>
</div>