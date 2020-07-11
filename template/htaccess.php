<?php

if (@$run_if_included) {
    function GetHTAccess($page_name)
    {
        switch ($page_name) {

            case "index.php":
                return "home";

            case "aboutus.php":
                return "aboutus";
				
			case "about.php":
                return "about";

            case "ourgoals.php":
                return "ourgoals";

            case "ourvision.php":
                return "ourvision";

            case "ourmission.php":
                return "ourmission";

            case "directormessage.php":
                return "directormessage";

            case "chart.php":
                return "chart";

            case "news.php":
                return "news";

            case "topics.php":
                return "topics";

            case "items.php":
                return "items";

            case "wishlist.php":
                return "wishlist";

            case "cart.php":
                return "shoppingcart";

            case "compare.php":
                return "compare";

            case "services.php":
                return "services";
				
			case "service.php":
                return "service";
				
			case "blog.php":
                return "blog";

            case "products.php":
                return "products";

            case "projects.php":
                return "projects";
				
			case "project.php":
                return "project";

            case "gallery.php":
                return "gallery";

            case "video.php":
                return "gallery";

            case "contact.php":
                return "contact";

            case "profile.php":
                return "profile";

            case "orders.php":
                return "orders";

            case "print.php":
                return "print";

            case "signout.php":
                return "signout";

        }
    }
}
?>