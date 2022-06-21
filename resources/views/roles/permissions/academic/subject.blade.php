<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">@lang('academic.subject') @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>@lang('role.do-you', ['plugin'=> __('academic.subject')])</p>
        <div>
            <input type="checkbox" value="subject-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageSub" name="permissions[]" id="ManageSub"
                @if($permissions['subject-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageSub">
                @lang('role.yes-allow', ['attribute'=> __('academic.subject')])
            </label>
        </div>
        <div style="@if($permissions['subject-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageSub">
            <div>
                <input type="checkbox" value="subject-add" class="flat-red " name="permissions[]" id="createSub"
                    @if($permissions['subject-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createSub">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="subject-edit" class="flat-red " name="permissions[]" id="editSub"
                    @if($permissions['subject-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editSub">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="subject-delete" class="flat-red " name="permissions[]" id="deleteSub"
                    @if($permissions['subject-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteSub">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>
