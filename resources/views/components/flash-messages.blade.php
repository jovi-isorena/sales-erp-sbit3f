<div>
    @if (session()->exists('success'))
    <div class="custom-alert custom-alert-success">
        {{ session()->get('success') }}
    </div>
    @elseif(session()->exists('error'))
        <div class="custom-alert custom-alert-error">
            {{ session()->get('error') }}
        </div>
    @elseif(session()->exists('warning'))
        <div class="custom-alert custom-alert-warning">
            {{ session()->get('warning') }}
        </div>
    @endif
</div>
<script>
    setTimeout(() => {
        $('.custom-alert').fadeOut();
        
    }, 5000);
</script>