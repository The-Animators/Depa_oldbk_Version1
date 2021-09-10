<form method="POST" id="formData">
    <input type="hidden" name="id" value="<?= $id ?>">
    <div class="form-group row">
        <label class="col-md-4 control-label" for="cancel_reason">Reason</label>
        <div class="col-md-8">
            <textarea class="form-control" id="cancel_reason" name="cancel_reason"></textarea>
        </div>
    </div>
</form>