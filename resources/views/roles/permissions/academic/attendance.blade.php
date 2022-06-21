<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">@lang('academic.attendance') @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>@lang('role.do-you', ['plugin'=> __('academic.attendance')])</p>
        <div>
            <input type="checkbox" value="attendance-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageAtndance" name="permissions[]" id="ManageAtndance"
                @if($permissions['attendance-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageAtndance">
                @lang('role.yes-allow', ['attribute'=> __('academic.attendance')])
            </label>
        </div>
        <div style="@if($permissions['attendance-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageAtndance">
            <div>
                <input type="checkbox" value="attendance-add" class="flat-red " name="permissions[]" id="createAtndance"
                    @if($permissions['attendance-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createAtndance">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="attendance-edit" class="flat-red " name="permissions[]" id="editAtndance"
                    @if($permissions['attendance-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editAtndance">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="attendance-delete" class="flat-red " name="permissions[]" id="deleteAtndance"
                    @if($permissions['attendance-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteAtndance">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>
