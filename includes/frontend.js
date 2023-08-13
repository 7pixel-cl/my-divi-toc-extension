jQuery(document).ready(function($) {
    if ($("h2").length > 0) {
        $(".divi-toc").each(function() {
            var tocContainer = $(this);
            var toc = "<h3>Table of Contents</h3><ul>";
            $("h2").each(function(index) {
                var currentHeader = $(this);
                var tocLink = "header-link-" + index;
                currentHeader.attr("id", tocLink);
                toc += "<li><a href='#" + tocLink + "'>" + currentHeader.text() + "</a></li>";
            });
            toc += "</ul>";
            tocContainer.html(toc);
        });
    }
});
