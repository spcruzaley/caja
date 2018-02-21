<?php

namespace Base;

use \Socio as ChildSocio;
use \SocioQuery as ChildSocioQuery;
use \Exception;
use \PDO;
use Map\SocioTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'socio' table.
 *
 *
 *
 * @method     ChildSocioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSocioQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildSocioQuery orderByCorreo($order = Criteria::ASC) Order by the correo column
 * @method     ChildSocioQuery orderByCantidad($order = Criteria::ASC) Order by the cantidad column
 * @method     ChildSocioQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSocioQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSocioQuery groupById() Group by the id column
 * @method     ChildSocioQuery groupByNombre() Group by the nombre column
 * @method     ChildSocioQuery groupByCorreo() Group by the correo column
 * @method     ChildSocioQuery groupByCantidad() Group by the cantidad column
 * @method     ChildSocioQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSocioQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSocioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSocioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSocioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSocioQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSocioQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSocioQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSocioQuery leftJoinAhorro($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ahorro relation
 * @method     ChildSocioQuery rightJoinAhorro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ahorro relation
 * @method     ChildSocioQuery innerJoinAhorro($relationAlias = null) Adds a INNER JOIN clause to the query using the Ahorro relation
 *
 * @method     ChildSocioQuery joinWithAhorro($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Ahorro relation
 *
 * @method     ChildSocioQuery leftJoinWithAhorro() Adds a LEFT JOIN clause and with to the query using the Ahorro relation
 * @method     ChildSocioQuery rightJoinWithAhorro() Adds a RIGHT JOIN clause and with to the query using the Ahorro relation
 * @method     ChildSocioQuery innerJoinWithAhorro() Adds a INNER JOIN clause and with to the query using the Ahorro relation
 *
 * @method     ChildSocioQuery leftJoinPrestamo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Prestamo relation
 * @method     ChildSocioQuery rightJoinPrestamo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Prestamo relation
 * @method     ChildSocioQuery innerJoinPrestamo($relationAlias = null) Adds a INNER JOIN clause to the query using the Prestamo relation
 *
 * @method     ChildSocioQuery joinWithPrestamo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Prestamo relation
 *
 * @method     ChildSocioQuery leftJoinWithPrestamo() Adds a LEFT JOIN clause and with to the query using the Prestamo relation
 * @method     ChildSocioQuery rightJoinWithPrestamo() Adds a RIGHT JOIN clause and with to the query using the Prestamo relation
 * @method     ChildSocioQuery innerJoinWithPrestamo() Adds a INNER JOIN clause and with to the query using the Prestamo relation
 *
 * @method     ChildSocioQuery leftJoinMulta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Multa relation
 * @method     ChildSocioQuery rightJoinMulta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Multa relation
 * @method     ChildSocioQuery innerJoinMulta($relationAlias = null) Adds a INNER JOIN clause to the query using the Multa relation
 *
 * @method     ChildSocioQuery joinWithMulta($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Multa relation
 *
 * @method     ChildSocioQuery leftJoinWithMulta() Adds a LEFT JOIN clause and with to the query using the Multa relation
 * @method     ChildSocioQuery rightJoinWithMulta() Adds a RIGHT JOIN clause and with to the query using the Multa relation
 * @method     ChildSocioQuery innerJoinWithMulta() Adds a INNER JOIN clause and with to the query using the Multa relation
 *
 * @method     ChildSocioQuery leftJoinAbono($relationAlias = null) Adds a LEFT JOIN clause to the query using the Abono relation
 * @method     ChildSocioQuery rightJoinAbono($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Abono relation
 * @method     ChildSocioQuery innerJoinAbono($relationAlias = null) Adds a INNER JOIN clause to the query using the Abono relation
 *
 * @method     ChildSocioQuery joinWithAbono($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Abono relation
 *
 * @method     ChildSocioQuery leftJoinWithAbono() Adds a LEFT JOIN clause and with to the query using the Abono relation
 * @method     ChildSocioQuery rightJoinWithAbono() Adds a RIGHT JOIN clause and with to the query using the Abono relation
 * @method     ChildSocioQuery innerJoinWithAbono() Adds a INNER JOIN clause and with to the query using the Abono relation
 *
 * @method     \AhorroQuery|\PrestamoQuery|\MultaQuery|\AbonoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSocio findOne(ConnectionInterface $con = null) Return the first ChildSocio matching the query
 * @method     ChildSocio findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSocio matching the query, or a new ChildSocio object populated from the query conditions when no match is found
 *
 * @method     ChildSocio findOneById(int $id) Return the first ChildSocio filtered by the id column
 * @method     ChildSocio findOneByNombre(string $nombre) Return the first ChildSocio filtered by the nombre column
 * @method     ChildSocio findOneByCorreo(string $correo) Return the first ChildSocio filtered by the correo column
 * @method     ChildSocio findOneByCantidad(int $cantidad) Return the first ChildSocio filtered by the cantidad column
 * @method     ChildSocio findOneByCreatedAt(string $created_at) Return the first ChildSocio filtered by the created_at column
 * @method     ChildSocio findOneByUpdatedAt(string $updated_at) Return the first ChildSocio filtered by the updated_at column *

 * @method     ChildSocio requirePk($key, ConnectionInterface $con = null) Return the ChildSocio by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSocio requireOne(ConnectionInterface $con = null) Return the first ChildSocio matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSocio requireOneById(int $id) Return the first ChildSocio filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSocio requireOneByNombre(string $nombre) Return the first ChildSocio filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSocio requireOneByCorreo(string $correo) Return the first ChildSocio filtered by the correo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSocio requireOneByCantidad(int $cantidad) Return the first ChildSocio filtered by the cantidad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSocio requireOneByCreatedAt(string $created_at) Return the first ChildSocio filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSocio requireOneByUpdatedAt(string $updated_at) Return the first ChildSocio filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSocio[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSocio objects based on current ModelCriteria
 * @method     ChildSocio[]|ObjectCollection findById(int $id) Return ChildSocio objects filtered by the id column
 * @method     ChildSocio[]|ObjectCollection findByNombre(string $nombre) Return ChildSocio objects filtered by the nombre column
 * @method     ChildSocio[]|ObjectCollection findByCorreo(string $correo) Return ChildSocio objects filtered by the correo column
 * @method     ChildSocio[]|ObjectCollection findByCantidad(int $cantidad) Return ChildSocio objects filtered by the cantidad column
 * @method     ChildSocio[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSocio objects filtered by the created_at column
 * @method     ChildSocio[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSocio objects filtered by the updated_at column
 * @method     ChildSocio[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SocioQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SocioQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'caja_db', $modelName = '\\Socio', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSocioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSocioQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSocioQuery) {
            return $criteria;
        }
        $query = new ChildSocioQuery();
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
     * @return ChildSocio|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SocioTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SocioTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSocio A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nombre, correo, cantidad, created_at, updated_at FROM socio WHERE id = :p0';
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
            /** @var ChildSocio $obj */
            $obj = new ChildSocio();
            $obj->hydrate($row);
            SocioTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSocio|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSocioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SocioTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSocioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SocioTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSocioQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SocioTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SocioTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SocioTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%', Criteria::LIKE); // WHERE nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombre The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSocioQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SocioTableMap::COL_NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the correo column
     *
     * Example usage:
     * <code>
     * $query->filterByCorreo('fooValue');   // WHERE correo = 'fooValue'
     * $query->filterByCorreo('%fooValue%', Criteria::LIKE); // WHERE correo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $correo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSocioQuery The current query, for fluid interface
     */
    public function filterByCorreo($correo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($correo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SocioTableMap::COL_CORREO, $correo, $comparison);
    }

    /**
     * Filter the query on the cantidad column
     *
     * Example usage:
     * <code>
     * $query->filterByCantidad(1234); // WHERE cantidad = 1234
     * $query->filterByCantidad(array(12, 34)); // WHERE cantidad IN (12, 34)
     * $query->filterByCantidad(array('min' => 12)); // WHERE cantidad > 12
     * </code>
     *
     * @param     mixed $cantidad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSocioQuery The current query, for fluid interface
     */
    public function filterByCantidad($cantidad = null, $comparison = null)
    {
        if (is_array($cantidad)) {
            $useMinMax = false;
            if (isset($cantidad['min'])) {
                $this->addUsingAlias(SocioTableMap::COL_CANTIDAD, $cantidad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cantidad['max'])) {
                $this->addUsingAlias(SocioTableMap::COL_CANTIDAD, $cantidad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SocioTableMap::COL_CANTIDAD, $cantidad, $comparison);
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
     * @return $this|ChildSocioQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SocioTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SocioTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SocioTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSocioQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SocioTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SocioTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SocioTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Ahorro object
     *
     * @param \Ahorro|ObjectCollection $ahorro the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSocioQuery The current query, for fluid interface
     */
    public function filterByAhorro($ahorro, $comparison = null)
    {
        if ($ahorro instanceof \Ahorro) {
            return $this
                ->addUsingAlias(SocioTableMap::COL_ID, $ahorro->getSocioId(), $comparison);
        } elseif ($ahorro instanceof ObjectCollection) {
            return $this
                ->useAhorroQuery()
                ->filterByPrimaryKeys($ahorro->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAhorro() only accepts arguments of type \Ahorro or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ahorro relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSocioQuery The current query, for fluid interface
     */
    public function joinAhorro($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ahorro');

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
            $this->addJoinObject($join, 'Ahorro');
        }

        return $this;
    }

    /**
     * Use the Ahorro relation Ahorro object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AhorroQuery A secondary query class using the current class as primary query
     */
    public function useAhorroQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAhorro($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ahorro', '\AhorroQuery');
    }

    /**
     * Filter the query by a related \Prestamo object
     *
     * @param \Prestamo|ObjectCollection $prestamo the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSocioQuery The current query, for fluid interface
     */
    public function filterByPrestamo($prestamo, $comparison = null)
    {
        if ($prestamo instanceof \Prestamo) {
            return $this
                ->addUsingAlias(SocioTableMap::COL_ID, $prestamo->getSocioId(), $comparison);
        } elseif ($prestamo instanceof ObjectCollection) {
            return $this
                ->usePrestamoQuery()
                ->filterByPrimaryKeys($prestamo->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildSocioQuery The current query, for fluid interface
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
     * Filter the query by a related \Multa object
     *
     * @param \Multa|ObjectCollection $multa the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSocioQuery The current query, for fluid interface
     */
    public function filterByMulta($multa, $comparison = null)
    {
        if ($multa instanceof \Multa) {
            return $this
                ->addUsingAlias(SocioTableMap::COL_ID, $multa->getSocioId(), $comparison);
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
     * @return $this|ChildSocioQuery The current query, for fluid interface
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
     * Filter the query by a related \Abono object
     *
     * @param \Abono|ObjectCollection $abono the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSocioQuery The current query, for fluid interface
     */
    public function filterByAbono($abono, $comparison = null)
    {
        if ($abono instanceof \Abono) {
            return $this
                ->addUsingAlias(SocioTableMap::COL_ID, $abono->getSocioId(), $comparison);
        } elseif ($abono instanceof ObjectCollection) {
            return $this
                ->useAbonoQuery()
                ->filterByPrimaryKeys($abono->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAbono() only accepts arguments of type \Abono or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Abono relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSocioQuery The current query, for fluid interface
     */
    public function joinAbono($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Abono');

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
            $this->addJoinObject($join, 'Abono');
        }

        return $this;
    }

    /**
     * Use the Abono relation Abono object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AbonoQuery A secondary query class using the current class as primary query
     */
    public function useAbonoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAbono($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Abono', '\AbonoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSocio $socio Object to remove from the list of results
     *
     * @return $this|ChildSocioQuery The current query, for fluid interface
     */
    public function prune($socio = null)
    {
        if ($socio) {
            $this->addUsingAlias(SocioTableMap::COL_ID, $socio->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the socio table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SocioTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SocioTableMap::clearInstancePool();
            SocioTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SocioTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SocioTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SocioTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SocioTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSocioQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SocioTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSocioQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SocioTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSocioQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SocioTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSocioQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SocioTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSocioQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SocioTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSocioQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SocioTableMap::COL_CREATED_AT);
    }

} // SocioQuery
