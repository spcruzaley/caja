<?php

namespace Base;

use \Ahorro as ChildAhorro;
use \AhorroQuery as ChildAhorroQuery;
use \Exception;
use \PDO;
use Map\AhorroTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ahorro' table.
 *
 *
 *
 * @method     ChildAhorroQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAhorroQuery orderBySocioId($order = Criteria::ASC) Order by the socio_id column
 * @method     ChildAhorroQuery orderBySemana($order = Criteria::ASC) Order by the semana column
 * @method     ChildAhorroQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildAhorroQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildAhorroQuery groupById() Group by the id column
 * @method     ChildAhorroQuery groupBySocioId() Group by the socio_id column
 * @method     ChildAhorroQuery groupBySemana() Group by the semana column
 * @method     ChildAhorroQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildAhorroQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildAhorroQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAhorroQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAhorroQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAhorroQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAhorroQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAhorroQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAhorroQuery leftJoinSocio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Socio relation
 * @method     ChildAhorroQuery rightJoinSocio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Socio relation
 * @method     ChildAhorroQuery innerJoinSocio($relationAlias = null) Adds a INNER JOIN clause to the query using the Socio relation
 *
 * @method     ChildAhorroQuery joinWithSocio($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Socio relation
 *
 * @method     ChildAhorroQuery leftJoinWithSocio() Adds a LEFT JOIN clause and with to the query using the Socio relation
 * @method     ChildAhorroQuery rightJoinWithSocio() Adds a RIGHT JOIN clause and with to the query using the Socio relation
 * @method     ChildAhorroQuery innerJoinWithSocio() Adds a INNER JOIN clause and with to the query using the Socio relation
 *
 * @method     ChildAhorroQuery leftJoinMulta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Multa relation
 * @method     ChildAhorroQuery rightJoinMulta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Multa relation
 * @method     ChildAhorroQuery innerJoinMulta($relationAlias = null) Adds a INNER JOIN clause to the query using the Multa relation
 *
 * @method     ChildAhorroQuery joinWithMulta($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Multa relation
 *
 * @method     ChildAhorroQuery leftJoinWithMulta() Adds a LEFT JOIN clause and with to the query using the Multa relation
 * @method     ChildAhorroQuery rightJoinWithMulta() Adds a RIGHT JOIN clause and with to the query using the Multa relation
 * @method     ChildAhorroQuery innerJoinWithMulta() Adds a INNER JOIN clause and with to the query using the Multa relation
 *
 * @method     \SocioQuery|\MultaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAhorro findOne(ConnectionInterface $con = null) Return the first ChildAhorro matching the query
 * @method     ChildAhorro findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAhorro matching the query, or a new ChildAhorro object populated from the query conditions when no match is found
 *
 * @method     ChildAhorro findOneById(int $id) Return the first ChildAhorro filtered by the id column
 * @method     ChildAhorro findOneBySocioId(int $socio_id) Return the first ChildAhorro filtered by the socio_id column
 * @method     ChildAhorro findOneBySemana(int $semana) Return the first ChildAhorro filtered by the semana column
 * @method     ChildAhorro findOneByCreatedAt(string $created_at) Return the first ChildAhorro filtered by the created_at column
 * @method     ChildAhorro findOneByUpdatedAt(string $updated_at) Return the first ChildAhorro filtered by the updated_at column *

 * @method     ChildAhorro requirePk($key, ConnectionInterface $con = null) Return the ChildAhorro by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAhorro requireOne(ConnectionInterface $con = null) Return the first ChildAhorro matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAhorro requireOneById(int $id) Return the first ChildAhorro filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAhorro requireOneBySocioId(int $socio_id) Return the first ChildAhorro filtered by the socio_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAhorro requireOneBySemana(int $semana) Return the first ChildAhorro filtered by the semana column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAhorro requireOneByCreatedAt(string $created_at) Return the first ChildAhorro filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAhorro requireOneByUpdatedAt(string $updated_at) Return the first ChildAhorro filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAhorro[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAhorro objects based on current ModelCriteria
 * @method     ChildAhorro[]|ObjectCollection findById(int $id) Return ChildAhorro objects filtered by the id column
 * @method     ChildAhorro[]|ObjectCollection findBySocioId(int $socio_id) Return ChildAhorro objects filtered by the socio_id column
 * @method     ChildAhorro[]|ObjectCollection findBySemana(int $semana) Return ChildAhorro objects filtered by the semana column
 * @method     ChildAhorro[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildAhorro objects filtered by the created_at column
 * @method     ChildAhorro[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildAhorro objects filtered by the updated_at column
 * @method     ChildAhorro[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AhorroQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AhorroQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'caja_db', $modelName = '\\Ahorro', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAhorroQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAhorroQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAhorroQuery) {
            return $criteria;
        }
        $query = new ChildAhorroQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAhorro|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AhorroTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AhorroTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAhorro A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, socio_id, semana, created_at, updated_at FROM ahorro WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAhorro $obj */
            $obj = new ChildAhorro();
            $obj->hydrate($row);
            AhorroTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildAhorro|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AhorroTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AhorroTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AhorroTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AhorroTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AhorroTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the socio_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySocioId(1234); // WHERE socio_id = 1234
     * $query->filterBySocioId(array(12, 34)); // WHERE socio_id IN (12, 34)
     * $query->filterBySocioId(array('min' => 12)); // WHERE socio_id > 12
     * </code>
     *
     * @see       filterBySocio()
     *
     * @param     mixed $socioId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function filterBySocioId($socioId = null, $comparison = null)
    {
        if (is_array($socioId)) {
            $useMinMax = false;
            if (isset($socioId['min'])) {
                $this->addUsingAlias(AhorroTableMap::COL_SOCIO_ID, $socioId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($socioId['max'])) {
                $this->addUsingAlias(AhorroTableMap::COL_SOCIO_ID, $socioId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AhorroTableMap::COL_SOCIO_ID, $socioId, $comparison);
    }

    /**
     * Filter the query on the semana column
     *
     * Example usage:
     * <code>
     * $query->filterBySemana(1234); // WHERE semana = 1234
     * $query->filterBySemana(array(12, 34)); // WHERE semana IN (12, 34)
     * $query->filterBySemana(array('min' => 12)); // WHERE semana > 12
     * </code>
     *
     * @param     mixed $semana The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function filterBySemana($semana = null, $comparison = null)
    {
        if (is_array($semana)) {
            $useMinMax = false;
            if (isset($semana['min'])) {
                $this->addUsingAlias(AhorroTableMap::COL_SEMANA, $semana['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($semana['max'])) {
                $this->addUsingAlias(AhorroTableMap::COL_SEMANA, $semana['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AhorroTableMap::COL_SEMANA, $semana, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(AhorroTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(AhorroTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AhorroTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(AhorroTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(AhorroTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AhorroTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Socio object
     *
     * @param \Socio|ObjectCollection $socio The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAhorroQuery The current query, for fluid interface
     */
    public function filterBySocio($socio, $comparison = null)
    {
        if ($socio instanceof \Socio) {
            return $this
                ->addUsingAlias(AhorroTableMap::COL_SOCIO_ID, $socio->getId(), $comparison);
        } elseif ($socio instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AhorroTableMap::COL_SOCIO_ID, $socio->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySocio() only accepts arguments of type \Socio or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Socio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function joinSocio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Socio');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Socio');
        }

        return $this;
    }

    /**
     * Use the Socio relation Socio object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SocioQuery A secondary query class using the current class as primary query
     */
    public function useSocioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSocio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Socio', '\SocioQuery');
    }

    /**
     * Filter the query by a related \Multa object
     *
     * @param \Multa|ObjectCollection $multa the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAhorroQuery The current query, for fluid interface
     */
    public function filterByMulta($multa, $comparison = null)
    {
        if ($multa instanceof \Multa) {
            return $this
                ->addUsingAlias(AhorroTableMap::COL_ID, $multa->getAhorroId(), $comparison);
        } elseif ($multa instanceof ObjectCollection) {
            return $this
                ->useMultaQuery()
                ->filterByPrimaryKeys($multa->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMulta() only accepts arguments of type \Multa or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Multa relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function joinMulta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Multa');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Multa');
        }

        return $this;
    }

    /**
     * Use the Multa relation Multa object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MultaQuery A secondary query class using the current class as primary query
     */
    public function useMultaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMulta($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Multa', '\MultaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAhorro $ahorro Object to remove from the list of results
     *
     * @return $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function prune($ahorro = null)
    {
        if ($ahorro) {
            $this->addUsingAlias(AhorroTableMap::COL_ID, $ahorro->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ahorro table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AhorroTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AhorroTableMap::clearInstancePool();
            AhorroTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AhorroTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AhorroTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AhorroTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AhorroTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(AhorroTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(AhorroTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(AhorroTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(AhorroTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(AhorroTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildAhorroQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(AhorroTableMap::COL_CREATED_AT);
    }

} // AhorroQuery
