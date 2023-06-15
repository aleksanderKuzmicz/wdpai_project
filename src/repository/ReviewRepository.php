<?php

require_once "Repository.php";
require_once __DIR__."/../models/Review.php";

class ReviewRepository extends Repository{
    public function getReview(int $id){
        $raw_statement = "SELECT * FROM reviews WHERE reviewID = :id";
        $statement = $this->database->connect()->prepare($raw_statement);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $review = $statement->fetch(PDO::FETCH_ASSOC);

        if ($review === false){
            return null;
        }

        return new Review(
            $review["title"],
            $review["description"],
            $review["image"]
        );
    }

    public function getReviews(): array{
        $result = [];
        $raw_statement = "SELECT * FROM reviews ORDER BY reviews.review_id DESC";
        $statement = $this->database->connect()->prepare($raw_statement);
        $statement->execute();
        $reviews = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($reviews as $review) {
            $result[] = new Review(
                $review["title"],
                $review["description"],
                $review["image"]
            );
        }

        return $result;
    }

    public function getReviewByTitle(string $searchString) {
        $searchString = '%'.strtolower($searchString).'%';
        $raw_statement = "SELECT * FROM reviews WHERE LOWER(title) like :search OR LOWER(description) LIKE :search";
        $statement = $this->database->connect()->prepare($raw_statement);
        $statement->bindParam(':search', $searchString, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
}

    public function addReview(Review $review){
        $date = new DateTime();
        $raw_statement = "INSERT INTO reviews (title, description, image, creation_date) VALUES (?, ?, ?, ?)";
        $statement = $this->database->connect()->prepare($raw_statement);
        $statement->execute([
            $review->getTitle(),
            $review->getDescription(),
            $review->getImage(),
            $date->format("Y-m-d")
        ]);
    }

}