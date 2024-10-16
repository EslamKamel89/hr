let members = 0;
let licenses = 0;
let activities = 0;
let contacts = 0;
function addContact() {
    contacts += 1;
    $("#input_contacts").append(`
        <div class="row" id="contact_${contacts}">
                                                <div class="form-group col-md-5">
                                                    <label for="exampleInputEmail111">Name</label>
                                                    <input type="text" value=""
                                                        class="form-control"
                                                        id="exampleInputEmail111" name="contact[name][]"
                                                        placeholder="Enter contact  name" autofocus autocomplete="">

                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="exampleInputEmail111">Value</label>
                                                    <input type="text" value=""
                                                        class="form-control "
                                                        id="exampleInputEmail111" name="contact[value][]"
                                                        placeholder="Enter contact  value" autofocus autocomplete="">

                                                </div>
                                                <div class="col-md-1"><div  class="btn btn-danger " onclick="removeThisItem('contact_${contacts}')"><i
                                                            class="mdi mdi-close "></i></div></div>
                                            </div>
        `);
}

function addLicense() {
    licenses+=1;
    alert(licenses);
    $("#licenses").append(`
         <div class="row" id="license_${licenses}">
                                        <div class="row p-3" id="licenses">
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail111">License</label>
                                                <input type="text" value=""
                                                    class="form-control" id="exampleInputEmail111" name="license[name][]"
                                                    placeholder="Enter License name" autofocus autocomplete="">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail111">Start date</label>
                                                <input type="date" value=""
                                                    class="form-control" id="exampleInputEmail111"
                                                    name="license[start][]" placeholder="Enter license start" autofocus
                                                    autocomplete="">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail111">End date</label>
                                                <input type="date" value=""
                                                    class="form-control" id="exampleInputEmail111" name="license[end][]"
                                                    placeholder="Enter license start" autofocus autocomplete="">
                                            </div>

                                            <div class="col-md-2"><div  class="btn btn-danger" onclick="removeThisItem('license_${licenses}')"><i
                                                        class="mdi mdi-close "></i></a>
                                            </div>
                                        </div>
                                       </div>
                                    `);
}

function addActivity() {
    activities+=1;
    $("#activities").append(`
        <div class="row" id="activity_${activities}">

                                                <div class="form-group col-md-10">
                                                    <label for="exampleInputEmail111">Name</label>
                                                    <input type="text" value=""
                                                        class="form-control col-md-12" id="exampleInputEmail111"
                                                        name="activity[name][]" placeholder="Enter activity name"
                                                        autofocus autocomplete="">
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="btn btn-danger"
                                                        onclick="removeThisItem('activity_${activities}')"><i
                                                            class="mdi mdi-close "></i></div>
                                                </div>
                                            </div>
                                    `);
}
function addMember() {
    members+=1;
    $("#members").append(`
        <div class="card  row p-1 border-1 m-2 col-md-12" id="member_${members}">
                                                <div class="row">
                                                    <div class="form-group col-md-5">
                                                        <label for="exampleInputEmail111">National Id</label>
                                                        <input type="text" value=""
                                                            class="form-control" id="exampleInputEmail111"
                                                            name="member[national_id][]" placeholder="Enter national id"
                                                            autofocus autocomplete="">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="exampleInputEmail111">Member name</label>
                                                        <input type="text" value=""
                                                            class="form-control" id="exampleInputEmail111"
                                                            name="member[name][]" placeholder="Enter member name"
                                                            autofocus autocomplete="">
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="form-group col-md-4">
                                                        <label for="exampleInputEmail111">Member nationality</label>
                                                        <select name="member[nationality][]" class="form-control"
                                                            id="">
                                                            <option value="">Please select nationality</option>
                                                            <option value="1">Egypt</option>
                                                            <option value="2">UAE</option>
                                                            <option value="3">India</option>
                                                            <option value="3">Pakistan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="exampleInputEmail111">Role</label>
                                                        <input type="text" value=""
                                                            class="form-control" id="exampleInputEmail111"
                                                            name="member[role][]" placeholder="Enter member role"
                                                            autofocus autocomplete="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="exampleInputEmail111">Percent</label>
                                                        <input type="text" value=""
                                                            class="form-control" id="exampleInputEmail111"
                                                            name="member[percent][]" placeholder="Enter member percent"
                                                            autofocus autocomplete="">
                                                    </div>

                                                    <div class="col-md-2"><div class="btn btn-danger" onclick="removeThisItem('member_${members}')">
                                                            <i class="mdi mdi-close "></i></div >
                                                    </div>
                                                </div>
                                            </div>
                                    `);
}
function removeThisItem(id){
    $(`#${id} input,#${id}  select,#${id} textarea`).each(
        function(index){
            var input = $(this);
            input.val("");
        }
    );
    $(`#${id}`).slideUp(250);
}
function setContacts(x) {
    contacts = x;
}
function setMembers(x) {
    members = x;
}
function setLicenses(x) {
    licenses = x;
}
function setActivities(x) {
    activities = x;
}
