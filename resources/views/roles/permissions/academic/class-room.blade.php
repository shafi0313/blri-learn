<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">@lang('academic.class-room') @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>@lang('role.do-you', ['plugin'=> __('academic.class-room')])</p>
        <div>
            <input type="checkbox" value="class-room-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageClsRom" name="permissions[]" id="ManageClsRom"
                @if($permissions['class-room-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageClsRom">
                @lang('role.yes-allow', ['attribute'=> __('academic.class-room')])
            </label>
        </div>
        <div style="@if($permissions['class-room-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageClsRom">
            <div>
                <input type="checkbox" value="class-room-add" class="flat-red " name="permissions[]" id="createClsRom"
                    @if($permissions['class-room-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createClsRom">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="class-room-edit" class="flat-red " name="permissions[]" id="editClsRom"
                    @if($permissions['class-room-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editClsRom">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="class-room-delete" class="flat-red " name="permissions[]" id="deleteClsRom"
                    @if($permissions['class-room-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteClsRom">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>
