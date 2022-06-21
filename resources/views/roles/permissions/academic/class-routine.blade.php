<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">@lang('academic.class-routine') @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>@lang('role.do-you', ['plugin'=> __('academic.class-routine')])</p>
        <div>
            <input type="checkbox" value="class-routine-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageClsRt" name="permissions[]" id="ManageClsRt"
                @if($permissions['class-routine-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageClsRt">
                @lang('role.yes-allow', ['attribute'=> __('academic.class-routine')])
            </label>
        </div>
        <div style="@if($permissions['class-routine-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageClsRt">
            <div>
                <input type="checkbox" value="class-routine-add" class="flat-red " name="permissions[]" id="createClsRt"
                    @if($permissions['class-routine-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createClsRt">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="class-routine-edit" class="flat-red " name="permissions[]" id="editClsRt"
                    @if($permissions['class-routine-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editClsRt">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="class-routine-delete" class="flat-red " name="permissions[]" id="deleteClsRt"
                    @if($permissions['class-routine-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteClsRt">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>
