(function ($) {

    var loaded = "";

    function getPageID() {
        return $(".js-node-tree-container").data("id");
    }

    function makeDropdownTree(rootNode, selected) {
        $(".js-node-tree-container").treeSelector(rootNode, selected, function (e, values) {
            $(".selected-nodes").val(values.toString());
        }, {
            checkWithParent: true,                // children checked/unchecked if true
            titleWithParent: false,               // title with 'title1 - title 2' if true
            notViewClickParentTitle: false,       // when item click, only view leaf title if true
            disabled: false,                      // disable the plugin
            emptyOptionPlaceholder: "No Options", // placeholder if empty
            showToggles: false                    // Show or hide toggles
        });
    }

    function requestData(url) {
        $.ajax(url)
            .done(function (response) {
                var data = JSON.parse(response);
                var treeList = [data.tree][0];
                var selected = data.selected;

                if (selected[0] === "") {
                    selected = [];
                }

                $(".js-node-tree-container").removeClass("lds-dual-ring");
                makeDropdownTree(treeList, selected);
                loaded = "dataRequest";
            })
            .fail(function (xhr) {
                console.log("Error: " + xhr.responseText);
            });
    }

    function getNodeValues() {
        $(".js-node-tree-container").addClass("lds-dual-ring");
        var pageID = getPageID();
        if (pageID) {
            var url = "api/nodetree/getTreeData?pageID=" + pageID;
            requestData(url);
        }
    }

    $(document).ready(function () {
        getNodeValues();
    });

    $(document).ajaxComplete(function () {
        if (loaded !== "dataRequest") {
            getNodeValues();
        }
        loaded = "saveButton";
    });

})(jQuery);