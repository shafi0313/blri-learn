<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">@lang('academic.department') @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>@lang('role.do-you', ['plugin'=> __('academic.department')])</p>
        <div>
            <input type="checkbox" value="department-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageDept" name="permissions[]" id="ManageDept"
                @if($permissions['department-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageDept">
                @lang('role.yes-allow', ['attribute'=> __('academic.department')])
            </label>
        </div>
        <div style="@if($permissions['department-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageDept">
            <div>
                <input type="checkbox" value="department-add" class="flat-red " name="permissions[]" id="createDept"
                    @if($permissions['department-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createDept">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="department-edit" class="flat-red " name="permissions[]" id="editDept"
                    @if($permissions['department-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editDept">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="department-delete" class="flat-red " name="permissions[]" id="deleteDept"
                    @if($permissions['department-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteDept">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>
