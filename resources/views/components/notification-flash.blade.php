<div>
    @if(session()->has('info'))
        <div class="toast position-absolute end-0 bg-info" data-bs-autohide="false" style="z-index: 10000;">
            <div class="toast-body d-flex text-white justify-content-between">
                <span>{{ session('info') }}</span> 
                <button type="button" class="btn-close text-white" data-bs-dismiss="toast" >X</button>
            </div>
        </div>

        <script>
            let toastElList = [].slice.call(document.querySelectorAll('.toast'))
            
            let toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl);
            });
            
            toastList.map(toast => toast.show());
        </script>
    @endif
    
    @if(session()->has('delete'))   
        <div class="toast position-absolute end-0 bg-danger" data-bs-autohide="false" style="z-index: 10000;">
            <div class="toast-body d-flex text-white justify-content-between">
                <span>{{ session('delete') }}</span> 
                <button type="button" class="btn-close" data-bs-dismiss="toast">X</button>
            </div>
        </div>
    @endif

    @if(session()->has('restore'))
        <div class="toast position-absolute end-0 bg-success" data-bs-autohide="false" style="z-index: 10000;">
            <div class="toast-body d-flex text-white justify-content-between">
                <span>{{ session('restore') }}</span> 
                <button type="button" class="btn-close" data-bs-dismiss="toast">X</button>
            </div>
        </div>
    @endif
</div>