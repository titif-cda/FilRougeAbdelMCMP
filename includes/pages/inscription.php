
    <?php
    $title_register = 'Formulaire d\'inscription';
    $btn_register = 's\'inscrire';
    $action = 'register';

    include('./includes/tempt/hero-section.php');
    include('./includes/tempt/form-register.php');

    ?>
    <section id="wysiwyg">
        <div class="container">
            <div class="title">
                <h3>Simple Bootstrap WYSIWYG Editor</h3>
            </div>

            <div id="editparent">
                <div id="editControls">
                    <div class="btn-group">
                        <a class="btn btn-xs btn-default" data-role="undo" href="#" title="Undo"><i class="fa fa-undo"></i></a>
                        <a class="btn btn-xs btn-default" data-role="redo" href="#" title="Redo"><i class="fa fa-repeat"></i></a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-xs btn-default" data-role="bold" href="#" title="Bold"><i class="fa fa-bold"></i></a>
                        <a class="btn btn-xs btn-default" data-role="italic" href="#" title="Italic"><i class="fa fa-italic"></i></a>
                        <a class="btn btn-xs btn-default" data-role="underline" href="#" title="Underline"><i class="fa fa-underline"></i></a>
                        <a class="btn btn-xs btn-default" data-role="strikeThrough" href="#" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-xs btn-default" data-role="indent" href="#" title="Blockquote"><i class="fa fa-indent"></i></a>
                        <a class="btn btn-xs btn-default" data-role="insertUnorderedList" href="#" title="Unordered List"><i class="fa fa-list-ul"></i></a>
                        <a class="btn btn-xs btn-default" data-role="insertOrderedList" href="#" title="Ordered List"><i class="fa fa-list-ol"></i></a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-xs btn-default" data-role="h1" href="#" title="Heading 1"><i class="fa fa-header"></i><sup>1</sup></a>
                        <a class="btn btn-xs btn-default" data-role="h2" href="#" title="Heading 2"><i class="fa fa-header"></i><sup>2</sup></a>
                        <a class="btn btn-xs btn-default" data-role="h3" href="#" title="Heading 3"><i class="fa fa-header"></i><sup>3</sup></a>
                        <a class="btn btn-xs btn-default" data-role="p" href="#" title="Paragraph"><i class="fa fa-paragraph"></i></a>
                    </div>
                </div>
                <div id="editor" contenteditable></div>
                <textarea name="ticketDesc" id="editorCopy" required="required" style="display:none;"></textarea>
            </div>

            <p>
                Inspired by <a href="https://codepen.io/trhino/pen/xyLAu">this pen</a>, I recoded and updated it to copy to a hidden textarea for use in forms/queries.<br />
                <a href="#" id="checkIt"><i class="fa fa-long-arrow-right"></i> See the Hidden textarea value</a>.
            </p>
        </div>
    </section>