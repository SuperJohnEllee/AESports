<div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h3 class="modal-title w-100 text-dark"><strong><span class="fa fa-newspaper-o"></span> Add News</strong></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
			</div>
			<div class="modal-body mx-4">
                <form method="post">
                    <div class="md-form mb-5">
                        <i class="fa fa-header text-dark prefix"></i>
                        <input type="text" name="news_title" id="news_title" class="form-control" required>
                        <label data-error="wrong" data-success="right" for="news_title">Title</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fa fa-pencil ext-dark prefix"></i>
                       	<textarea class="form-control md-textarea" name="news_content" id="news_content" maxlength="1000" rows="7" style="resize: none; margin-bottom: 8px;" autofocus required></textarea>
                        <label data-error="wrong" data-success="right" for="news_content">Content</label>
						<br/>
                        <span>Posted by <span class="font-weight-bold"><?php echo $name; ?></span></span>
                        <button type="submit" class="btn btn-default pull-right" name="post_news" data-loading-text="Logging in.."><span class="fa fa-sign-in"></span> Post</button>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>