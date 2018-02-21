<?php

namespace Base;

use \Abono as ChildAbono;
use \AbonoQuery as ChildAbonoQuery;
use \Exception;
use \PDO;
use Map\AbonoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'abono' table.
 *
 *
 *
 * @method     ChildAbonoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAbonoQuery orderBySocioId($order = Criteria::ASC) Order by the socio_id column
 * @method     ChildAbonoQuery orderByPrestamoId($order = Criteria::ASC) Order by the prestamo_id column
 * @method     ChildAbonoQuery orderByCapital($order = Criteria::ASC) Order by the capital column
 * @method     ChildAbonoQuery orderByInteres($order = Criteria::ASC) Order by the interes column
 * @method     ChildAbonoQuery orderByComentario($order = Criteria::ASC) Order by the comentario column
 * @method     ChildAbonoQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildAbonoQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildAbonoQuery groupById() Group by the id column
 * @method     ChildAbonoQuery groupBySocioId() Group by the socio_id column
 * @method     ChildAbonoQuery groupByPrestamoId() Group by the prestamo_id column
 * @method     ChildAbonoQuery groupByCapital() Group by the capital column
 * @method     ChildAbonoQuery groupByInteres() Group by the interes column
 * @method     ChildAbonoQuery groupByComentario() Group by the comentario column
 * @method     ChildAbonoQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildAbonoQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildAbonoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAbonoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAbonoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAbonoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAbonoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAbonoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAbonoQuery leftJoinSocio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Socio relation
 * @method     ChildAbonoQuery rightJoinSocio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Socio relation
 * @method     ChildAbonoQuery innerJoinSocio($relationAlias = null) Adds a INNER JOIN clause to the query using the Socio relation
 *
 * @method     ChildAbonoQuery joinWithSocio($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Socio relation
 *
 * @method     ChildAbonoQuery leftJoinWithSocio() Adds a LEFT JOIN clause and with to the query using the Socio relation
 * @method     ChildAbonoQuery rightJoinWithSocio() Adds a RIGHT JOIN clause and with to the query using the Socio relation
 * @method     ChildAbonoQuery innerJoinWithSocio() Adds a INNER JOIN clause and with to the query using the Socio relation
 *
 * @method     ChildAbonoQuery leftJoinPrestamo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Prestamo relation
 * @method     ChildAbonoQuery rightJoinPrestamo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Prestamo relation
 * @method     ChildAbonoQuery innerJoinPrestamo($relationAlias = null) Adds a INNER JOIN clause to the query using the Prestamo relation
 *
 * @method     ChildAbonoQuery joinWithPrestamo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Prestamo relation
 *
 * @method     ChildAbonoQuery leftJoinWithPrestamo() Adds a LEFT JOIN clause and with to the query using the Prestamo relation
 * @method     ChildAbonoQuery rightJoinWithPrestamo() Adds a RIGHT JOIN clause and with to the query using the Prestamo relation
 * @method     ChildAbonoQuery innerJoinWithPrestamo() Adds a INNER JOIN clause and with to the query using the Prestamo relation
 *
 * @method     \SocioQuery|\PrestamoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAbono findOne(ConnectionInterface $con = null) Return the first ChildAbono matching the query
 * @method     ChildAbono findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAbono matching the query, or a new ChildAbono object populated from the query conditions when no match is found
 *
 * @method     ChildAbono findOneById(int $id) Return the first ChildAbono filtered by the id column
 * @method     ChildAbono findOneBySocioId(int $socio_id) Return the first ChildAbono filtered by the socio_id column
 * @method     ChildAbono findOneByPrestamoId(int $prestamo_id) Return the first ChildAbono filtered by the prestamo_id column
 * @method     ChildAbono findOneByCapital(int $capital) Return the first ChildAbono filtered by the capital column
 * @method     ChildAbono findOneByInteres(int $interes) Return the first ChildAbono filtered by the interes column
 * @method     ChildAbono findOneByComentario(string $comentario) Return the first ChildAbono filtered by the comentario column
 * @method     ChildAbono findOneByCreatedAt(string $created_at) Return the first ChildAbono filtered by the created_at column
 * @method     ChildAbono findOneByUpdatedAt(string $updated_at) Return the first ChildAbono filtered by the updated_at column *

 * @method     ChildAbono requirePk($key, ConnectionInterface $con = null) Return the ChildAbono by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbono requireOne(ConnectionInterface $con = null) Return the first ChildAbono matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAbono requireOneById(int $id) Return the first ChildAbono filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbono requireOneBySocioId(int $socio_id) Return the first ChildAbono filtered by the socio_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbono requireOneByPrestamoId(int $prestamo_id) Return the first ChildAbono filtered by the prestamo_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbono requireOneByCapital(int $capital) Return the first ChildAbono filtered by the capital column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbono requireOneByInteres(int $interes) Return the first ChildAbono filtered by the interes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbono requireOneByComentario(string $comentario) Return the first ChildAbono filtered by the comentario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbono requireOneByCreatedAt(string $created_at) Return the first ChildAbono filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbono requireOneByUpdatedAt(string $updated_at) Return the first ChildAbono filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAbono[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAbono objects based on current ModelCriteria
 * @method     ChildAbono[]|ObjectCollection findById(int $id) Return ChildAbono objects filtered by the id column
 * @method     ChildAbono[]|ObjectCollection findBySocioId(int $socio_id) Return ChildAbono objects filtered by the socio_id column
 * @method     ChildAbono[]|ObjectCollection findByPrestamoId(int $prestamo_id) Return ChildAbono objects filtered by the prestamo_id column
 * @method     ChildAbono[]|ObjectCollection findByCapital(int $capital) Return ChildAbono objects filtered by the capital column
 * @method     ChildAbono[]|ObjectCollection findByInteres(int $interes) Return ChildAbono objects filtered by the interes column
 * @method     ChildAbono[]|ObjectCollection findByComentario(string $comentario) Return ChildAbono objects filtered by the comentario column
 * @method     ChildAbono[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildAbono objects filtered by the created_at column
 * @method     ChildAbono[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildAbono objects filtered by the updated_at column
 * @method     ChildAbono[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AbonoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AbonoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'caja_db', $modelName = '\\Abono', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAbonoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAbonoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAbonoQuery) {
            return $criteria;
        }
        $query = new ChildAbonoQuery();
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
     * @return ChildAbono|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AbonoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AbonoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAbono A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, socio_id, prestamo_id, capital, interes, comentario, created_at, updated_at FROM abono WHERE id = :p0';
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
            /** @var ChildAbono $obj */
            $obj = new ChildAbono();
            $obj->hydrate($row);
            AbonoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAbono|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AbonoTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AbonoTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AbonoTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AbonoTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbonoTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function filterBySocioId($socioId = null, $comparison = null)
    {
        if (is_array($socioId)) {
            $useMinMax = false;
            if (isset($socioId['min'])) {
                $this->addUsingAlias(AbonoTableMap::COL_SOCIO_ID, $socioId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($socioId['max'])) {
                $this->addUsingAlias(AbonoTableMap::COL_SOCIO_ID, $socioId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbonoTableMap::COL_SOCIO_ID, $socioId, $comparison);
    }

    /**
     * Filter the query on the prestamo_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPrestamoId(1234); // WHERE prestamo_id = 1234
     * $query->filterByPrestamoId(array(12, 34)); // WHERE prestamo_id IN (12, 34)
     * $query->filterByPrestamoId(array('min' => 12)); // WHERE prestamo_id > 12
     * </code>
     *
     * @see       filterByPrestamo()
     *
     * @param     mixed $prestamoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function filterByPrestamoId($prestamoId = null, $comparison = null)
    {
        if (is_array($prestamoId)) {
            $useMinMax = false;
            if (isset($prestamoId['min'])) {
                $this->addUsingAlias(AbonoTableMap::COL_PRESTAMO_ID, $prestamoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prestamoId['max'])) {
                $this->addUsingAlias(AbonoTableMap::COL_PRESTAMO_ID, $prestamoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbonoTableMap::COL_PRESTAMO_ID, $prestamoId, $comparison);
    }

    /**
     * Filter the query on the capital column
     *
     * Example usage:
     * <code>
     * $query->filterByCapital(1234); // WHERE capital = 1234
     * $query->filterByCapital(array(12, 34)); // WHERE capital IN (12, 34)
     * $query->filterByCapital(array('min' => 12)); // WHERE capital > 12
     * </code>
     *
     * @param     mixed $capital The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function filterByCapital($capital = null, $comparison = null)
    {
        if (is_array($capital)) {
            $useMinMax = false;
            if (isset($capital['min'])) {
                $this->addUsingAlias(AbonoTableMap::COL_CAPITAL, $capital['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($capital['max'])) {
                $this->addUsingAlias(AbonoTableMap::COL_CAPITAL, $capital['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbonoTableMap::COL_CAPITAL, $capital, $comparison);
    }

    /**
     * Filter the query on the interes column
     *
     * Example usage:
     * <code>
     * $query->filterByInteres(1234); // WHERE interes = 1234
     * $query->filterByInteres(array(12, 34)); // WHERE interes IN (12, 34)
     * $query->filterByInteres(array('min' => 12)); // WHERE interes > 12
     * </code>
     *
     * @param     mixed $interes The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function filterByInteres($interes = null, $comparison = null)
    {
        if (is_array($interes)) {
            $useMinMax = false;
            if (isset($interes['min'])) {
                $this->addUsingAlias(AbonoTableMap::COL_INTERES, $interes['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interes['max'])) {
                $this->addUsingAlias(AbonoTableMap::COL_INTERES, $interes['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbonoTableMap::COL_INTERES, $interes, $comparison);
    }

    /**
     * Filter the query on the comentario column
     *
     * Example usage:
     * <code>
     * $query->filterByComentario('fooValue');   // WHERE comentario = 'fooValue'
     * $query->filterByComentario('%fooValue%', Criteria::LIKE); // WHERE comentario LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comentario The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function filterByComentario($comentario = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comentario)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbonoTableMap::COL_COMENTARIO, $comentario, $comparison);
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
     * @return $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(AbonoTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(AbonoTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbonoTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(AbonoTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(AbonoTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbonoTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Socio object
     *
     * @param \Socio|ObjectCollection $socio The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAbonoQuery The current query, for fluid interface
     */
    public function filterBySocio($socio, $comparison = null)
    {
        if ($socio instanceof \Socio) {
            return $this
                ->addUsingAlias(AbonoTableMap::COL_SOCIO_ID, $socio->getId(), $comparison);
        } elseif ($socio instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AbonoTableMap::COL_SOCIO_ID, $socio->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildAbonoQuery The current query, for fluid interface
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
     * Filter the query by a related \Prestamo object
     *
     * @param \Prestamo|ObjectCollection $prestamo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAbonoQuery The current query, for fluid interface
     */
    public function filterByPrestamo($prestamo, $comparison = null)
    {
        if ($prestamo instanceof \Prestamo) {
            return $this
                ->addUsingAlias(AbonoTableMap::COL_PRESTAMO_ID, $prestamo->getId(), $comparison);
        } elseif ($prestamo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AbonoTableMap::COL_PRESTAMO_ID, $prestamo->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPrestamo() only accepts arguments of type \Prestamo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Prestamo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function joinPrestamo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Prestamo');

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
            $this->addJoinObject($join, 'Prestamo');
        }

        return $this;
    }

    /**
     * Use the Prestamo relation Prestamo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PrestamoQuery A secondary query class using the current class as primary query
     */
    public function usePrestamoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPrestamo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Prestamo', '\PrestamoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAbono $abono Object to remove from the list of results
     *
     * @return $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function prune($abono = null)
    {
        if ($abono) {
            $this->addUsingAlias(AbonoTableMap::COL_ID, $abono->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the abono table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AbonoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AbonoTableMap::clearInstancePool();
            AbonoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AbonoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AbonoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AbonoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AbonoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(AbonoTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(AbonoTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(AbonoTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(AbonoTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(AbonoTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildAbonoQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(AbonoTableMap::COL_CREATED_AT);
    }

} // AbonoQuery
