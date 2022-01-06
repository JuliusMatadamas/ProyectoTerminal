	</main>

    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h1></h1>
                <span class="modal-close">&times;</span>
            </div>

            <div class="modal-body">
                <p></p>
            </div>

            <div class="modal-footer">
                <div class="modal-footer-left">
                    <button class="btn btn-secondary" id="modal-btn-cancel"></button>
                </div>
                <div class="modal-footer-right">
                    <button class="btn btn-danger" id="modal-btn-continue" style="display: none"></button>
                </div>
            </div>
        </div>
    </div>

	<!-- Js's -->
	<script src="<?php echo JS; ?>/functions.js" type="text/javascript"></script>
    <?php require INCLUDES.CONTROLLER.DS.CONTROLLER.'Js.php'; ?><!-- ./Js's -->
</body>
</html>