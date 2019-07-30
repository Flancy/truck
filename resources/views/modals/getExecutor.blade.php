<div class="modal fade" id="getExecutor" tabindex="-1" role="dialog" aria-labelledby="addOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Исполнитель</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            @if(Auth::user()->isExecutor == 1)
                <div class="modal-footer justify-content-center">
                    <a href="#" class="btn btn-danger orderCancel">Заказ не выполнен</a>
                    <a href="#" class="btn btn-success orderComplete">Заказ выполнен</a>
                </div>
            @endif
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <a href="#" class="btn btn-success btn-more">Перейти на исполнителя</a>
            </div>
        </div>
    </div>
</div>