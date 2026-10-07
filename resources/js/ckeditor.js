ClassicEditor.create(document.getElementById("activity"), {
    toolbar: {
        items: [
            "heading",
            "|",
            "fontFamily",
            "fontSize",
            "bold",
            "italic",
            "alignment",
            "removeFormat",
            "|",
            "bulletedList",
            "numberedList",
            "|",
            "indent",
            "outdent",
            "|",
            "insertTable",
            "fontBackgroundColor",
            "fontColor",
            "undo",
            "redo",
            "imageInsert",
            "link",
            "mediaEmbed",
            "codeBlock",
            "blockQuote",
            "horizontalLine",
        ],
    },
    language: "es",
    image: {
        toolbar: ["imageTextAlternative", "imageStyle:full", "imageStyle:side"],
    },
    table: {
        contentToolbar: ["tableColumn", "tableRow", "mergeTableCells"],
    },
    link: {
        addTargetToExternalLinks: true,
        defaultProtocol: "http://",
    },
    mediaEmbed: {
        previewsInData: true,
    },
    licenseKey: "",
})
    .then(function (editor) {
        window.editor = editor;

        var textarea = document.getElementById("activity");
        if (textarea && textarea.form) {
            textarea.form.addEventListener("submit", function () {
                var content = editor.getData();
                if (content) {
                    try {
                        textarea.value = btoa(
                            encodeURIComponent(content).replace(
                                /%([0-9A-F]{2})/g,
                                function (match, p1) {
                                    return String.fromCharCode("0x" + p1);
                                }
                            )
                        );
                    } catch (e) {
                        textarea.value = content;
                    }
                }
            });
        }
    })
    .catch(function (err) {
        console.error(err);
    });
