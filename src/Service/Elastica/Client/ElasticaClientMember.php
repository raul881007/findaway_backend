<?php

namespace App\Service\Elastica\Client;

use App\Entity\Member;
use App\Service\ElasticaPaginator;
use Elastica\Aggregation\Nested;
use Elastica\Aggregation\Range;
use Elastica\Aggregation\Terms;
use Elastica\Document;
use Elastica\Query;
use Elastica\Script\Script;
use Elastica\Type\Mapping;

/**
 * Class ElasticaClientMember
 * @package App\Service\Elastica\Client
 */
class ElasticaClientMember extends ElasticaClientBase
{
    /**
     * @return string
     */
    protected function getIndex(): string
    {
        return 'product';
    }

    /**
     * Create type & mapping
     */
    public function createMapping(): void
    {
        // Create a type
        $elasticaType = $this->client->getClient()->getIndex($this->getIndex())->getType('_doc');

        // Define mapping
        $mapping = new Mapping();
        $mapping->setType($elasticaType);

        $mapping->setProperties(array(
            'id' => array('type' => 'integer'),
            'firstname' => array('type' => 'text'),
            'lastname' => array('type' => 'text'),
            'email' => array('type' => 'text', 'analyzer' => 'index_keyword_analyzer'),
            'phone' => array('type' => 'text', 'analyzer' => 'index_keyword_analyzer'),
            'search' => array('type' => 'text'),
            'search_ngram' => array('type' => 'text', 'analyzer' => 'analyzer_ngram'),
            'search_whitespace' => array('type' => 'text', 'analyzer' => 'analyzer_whitespace')
        ));

        // Send mapping to type
        $mapping->send();
    }

    /**
     * @param Member $entity
     * @return array
     * @throws \Exception
     */
    public function toArray(Member $entity): array
    {
        return [
            'id' => $entity->getId(),
            'firstname' => $entity->getFirstname(),
            'lastname' => $entity->getLastname(),
            'email' => $entity->getEmail(),
            'phone' => $entity->getPhone(),
        ];
    }

    /**
     * @param Query $query
     * @return Query
     */
    protected function addAggregations(Query $query): Query
    {
//        $agg = new Nested('category', 'category');
//        $terms = new Terms('id');
//        $script = new Script("doc['category.id'].value + '|' + doc['category.name'].value");
//        $terms->setScript($script);
//        $terms->setSize(30);
//        $agg->addAggregation($terms);
//        $query->addAggregation($agg);
//
//        $agg = new Range('price');
//        $agg->setField('price');
//        $agg->addRange(0, 1000);
//        $agg->addRange(1000, 2000);
//        $agg->addRange(2000, 3000);
//        $agg->addRange(3000, 4000);
//        $agg->addRange(4000, 5000);
//        $agg->addRange(5000);
//        $query->addAggregation($agg);

        return $query;
    }

    /**
     * @param array $params
     * @return ElasticaPaginator
     */
    public function search(array $params): ElasticaPaginator
    {
        # Hits query
        $query = new Query();

        $boolQuery = new Query\BoolQuery();

        // filter by category
        /*$term = new Query\Match();
        $term->setField('category.slug', $params['categorySlug']);
        $boolQuery->addMust($term);*/

        if (isset($params['q'])) {
            $boolQuery->addMust($this->getKeywordQuery($params['q']));
        }

        $query->setQuery($boolQuery);

        $page = isset($params['page']) ? $params['page'] : 1;
        $size = isset($params['perPage']) ? $params['perPage'] : 20;
        $from = $size * ($page - 1);

        $query
            ->setFrom($from)
            ->setSize($size)
            ->setSort(['id' => 'desc'])
        ;

        $search = $this->client->createSearch($this->getIndex());
        $search->setQuery($query);

        $results = $search->search();

        $data = array_map(function (Document $document) {
            return $document->toArray()['_source'];
        }, $results->getDocuments());

        // Facets
        $query = new Query();
        $query->setSize(0);
        $this->addAggregations($query);

        $search = $this->client->createSearch($this->getIndex());
        $search->setQuery($query);

        $elasticaPaginator = new ElasticaPaginator();
        $elasticaPaginator->setTotalItems($results->getTotalHits());
        $elasticaPaginator->setResults($data);
        $elasticaPaginator->setCurrentPage($page);
        $elasticaPaginator->setItemsPerPage($size);
        $elasticaPaginator->setAggregations($search->search()->getAggregations());

        return $elasticaPaginator;
    }
}
