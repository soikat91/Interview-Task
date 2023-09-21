<!-- Modal -->
<div class="modal animated zoomIn" id="show-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Task Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3">
                    <div class="container-fluid">
                        <br/>
                        <div class="row">
                            <div class="col-8">
                               
                                <h4 class="text-center"><span id="sTitle"></span> </h4>
                                <p class="text-xs mx-0 my-1"> <span id="sDes"></span></p>
                               
                            </div>
                            
                        </div>
                        <hr class="mx-0 my-2 p-0 bg-secondary"/>
                        
                       
                    </div>
            </div>
           
        </div>
    </div>
</div>



<script>

    async function taskShowById(id) {
    document.getElementById('taskID').value=id;        
    showLoader()
    let res=await axios.post('/task-show',{id:id})
    document.getElementById('sTitle').innerText=res.data['title']
    document.getElementById('sDes').innerText=res.data['description']      
    hideLoader()

    }
</script>
